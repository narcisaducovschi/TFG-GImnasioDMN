<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\UserModel;

class StripeController extends BaseController
{

    public function subscription()
    {
        $sessionUser = session()->get('register_data');

        if (!$sessionUser) {
            return redirect()->to('/register');
        }

        $priceId = $this->request->getPost('price_id');

        $planes = [
            PLANES['PLAN_BASICO'] => 5,
            PLANES['PLAN_PREMIUM'] => 4
        ];

        if (!isset($planes[$priceId])) {
            die('Plan no válido');
        }

        // asignar rol según plan
        $sessionUser['id_rol'] = $planes[$priceId];

        session()->set('register_data', $sessionUser);

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
    }

    public function pagoExito()
    {

        $sessionId = $this->request->getGet('session_id');

        if (!$sessionId) {
            return redirect()->to('/register');
        }

        Stripe::setApiKey(STRIPE_SECRET);
        // Recuperar sesión de Stripe
        $checkoutSession = \Stripe\Checkout\Session::retrieve($sessionId);

        if ($checkoutSession->payment_status !== 'paid') {
            die('Pago no confirmado');
        }

        $session = session();
        $userData = $session->get('register_data');

        if (!$userData) {
            return redirect()->to('/register');
        }

        $userModel = new UserModel();

        $userModel->insert($userData);

        // limpiar datos de registro
        $session->remove('register_data');

        return view('pago_exito', ['sessionId' => $sessionId]);
    }

    public function pagoCancelado()
    {
        return view('pago_cancelado');
    }
}
