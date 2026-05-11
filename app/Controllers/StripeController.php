<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\UserModel;

class StripeController extends BaseController
{
    public function __construct()
    {
        $key = env('STRIPE_SECRET') ?? STRIPE_SECRET;
        \Stripe\Stripe::setApiKey($key);
    }

    public function subscription()
    {
        $sessionUser = session()->get('register_data');

        if (!$sessionUser) {
            return redirect()->to('/register');
        }

        $priceId = $this->request->getPost('price_id');

        $configPlanes = [
            PLANES['PLAN_BASICO']  => [
                'id_rol'          => 5,
                'id_suscripcion'  => 2 
            ],
            PLANES['PLAN_PREMIUM'] => [
                'id_rol'          => 5,
                'id_suscripcion'  => 3 
            ]
        ];

        if (!isset($configPlanes[$priceId])) {
            return redirect()->back()->with('error', 'El plan seleccionado no es válido.');
        }
        $sessionUser['id_rol']          = $configPlanes[$priceId]['id_rol'];
        $sessionUser['id_suscripcion']  = $configPlanes[$priceId]['id_suscripcion'];

        session()->set('register_data', $sessionUser);

        try {
            \Stripe\Stripe::setApiKey(STRIPE_SECRET);

            $session = \Stripe\Checkout\Session::create([
                'mode' => 'subscription',
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price' => $priceId,
                    'quantity' => 1,
                ]],
                'success_url' => base_url('pago-exito') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => base_url('pago-cancelado'),
            ]);

            return redirect()->to($session->url);
        } catch (\Exception $e) {
            return "Error al conectar con Stripe: " . $e->getMessage();
        }
    }

    public function pagoExito()
    {
        $sessionId = $this->request->getGet('session_id');

        if (!$sessionId) {
            return redirect()->to('/register')->with('error', 'Sesión de pago no encontrada.');
        }

        try {
            \Stripe\Stripe::setApiKey(STRIPE_SECRET);
            $checkoutSession = \Stripe\Checkout\Session::retrieve($sessionId);

            if ($checkoutSession->payment_status !== 'paid') {
                return redirect()->to('/register')->with('error', 'El pago no se ha completado.');
            }

            $session = session();
            $userData = $session->get('register_data');
            if (!$userData) {
                if ($session->get('isLoggedIn')) {
                    return view('pago_exito', ['sessionId' => $sessionId]);
                }
                return redirect()->to('/login')->with('error', 'La sesión de registro ha expirado.');
            }
            $userData['stripe_customer_id'] = $checkoutSession->customer;
            $userModel = new UserModel();

            if ($userModel->insert($userData)) {
                $newUserId = $userModel->getInsertID();
                $session->set([
                    'user_id'    => $newUserId,
                    'email'      => $userData['email'],
                    'nombre'     => $userData['nombre'],
                    'id_rol'     => $userData['id_rol'],
                    'isLoggedIn' => true
                ]);
                $session->remove('register_data');

                return view('pago_exito', ['sessionId' => $sessionId]);
            } else {
                log_message('error', 'Error DB Insert: ' . json_encode($userModel->errors()));
                return "Error crítico al guardar tu cuenta. Por favor, contacta a soporte.";
            }
        } catch (\Exception $e) {
            log_message('error', 'Error en pagoExito: ' . $e->getMessage());
            return "Error al procesar el pago: " . $e->getMessage();
        }
    }

    public function pagoCancelado()
    {
        return view('pago_cancelado');
    }
    public function checkoutCarrito()
    {
        $cart = session()->get('cart');

        if (!$cart || empty($cart)) {
            return redirect()->to('/search')->with('error', 'El carrito está vacío');
        }

        $line_items = [];

        foreach ($cart as $item) {
            $priceId = $item['stripe_price_id'];

            if (strpos($priceId, 'price_') !== 0) {
                $priceId = PRODUCTOS_STRIPE[$priceId] ?? null;
            }

            if (!$priceId || strpos($priceId, 'price_') !== 0) {
                return "ERROR CRÍTICO: El producto '" . $item['nombre'] . "' no tiene un Price ID válido. El valor obtenido fue: " . var_export($priceId, true) . ". Revisa tu archivo .env y constantes.";
            }

            $line_items[] = [
                'price'    => $priceId,
                'quantity' => $item['cantidad'],
            ];
        }

        try {
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items'  => $line_items,
                'mode'        => 'payment',
                'success_url' => base_url('pago-tienda-exito') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url'  => base_url('search'),
            ]);

            return redirect()->to($checkout_session->url);
        } catch (\Exception $e) {
            return "Error de Stripe: " . $e->getMessage();
        }
    }

    public function portalSuscripcion()
    {
        $userId = session()->get('user_id');

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if (!$user || empty($user['stripe_customer_id'])) {
            return redirect()->back()->with('error', 'No se encontró una suscripción vinculada a tu cuenta.');
        }

        \Stripe\Stripe::setApiKey(STRIPE_SECRET);

        $session = \Stripe\BillingPortal\Session::create([
            'customer' => $user['stripe_customer_id'],
            'return_url' => base_url('misClases'),
        ]);

        // Redirigimos a stripe
        return redirect()->to($session->url);
    }
}
