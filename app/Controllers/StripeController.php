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
            PLANES['PLAN_BASICO'] => 2,
            PLANES['PLAN_PREMIUM'] => 3
        ];

        if (!isset($planes[$priceId])) {
            die('Plan no válido');
        }

        // asignar rol según plan
        $sessionUser['id_suscripcion'] = $planes[$priceId];

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

        \Stripe\Stripe::setApiKey(STRIPE_SECRET);

        $checkoutSession = \Stripe\Checkout\Session::retrieve($sessionId);

        if ($checkoutSession->payment_status !== 'paid') {
            die('Pago no confirmado');
        }

        $session = session();
        $userData = $session->get('register_data');

        if (!$userData) {
            return redirect()->to('/register');
        }

        $userData['stripe_customer_id'] = $checkoutSession->customer;

        $userModel = new \App\Models\UserModel();
        $userModel->insert($userData);

        $session->remove('register_data');

        return view('pago_exito', ['sessionId' => $sessionId]);
    }


    public function pagoCancelado()
    {
        return view('pago_cancelado');
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
            'return_url' => base_url('misClases'), // donde vuelve al salir de Stripe
        ]);

        // Redirigimos a stripe
        return redirect()->to($session->url);
    }
}
