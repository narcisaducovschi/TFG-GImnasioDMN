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
    if (!$priceId) {
        die('Error: price_id vacío.');
    }

    Stripe::setApiKey(STRIPE_SECRET);

    $session = Session::create([
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
