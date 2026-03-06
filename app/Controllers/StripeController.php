<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends BaseController
{
    public function showPlans()
    {
        $plans = PLANES;
        return view('planes', ['plans' => $plans]);
    }

    public function subscription()
    {
        $priceId = $this->request->getPost('price_id');

        if (!$priceId) {
            die('Error: price_id vacío. Revisa el formulario y tu .env');
        }

        Stripe::setApiKey(STRIPE_SECRET);

        $session = Session::create([
            'mode' => 'subscription',
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price' => $priceId,
                'quantity' => 1,
            ]],
            'success_url' => base_url('/pago-exito?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url' => base_url('/pago-cancelado'),
        ]);

        return redirect()->to($session->url);
    }

    public function pagoExito()
    {
        $sessionId = $this->request->getGet('session_id');
        return view('pago_exito', ['sessionId' => $sessionId]);
    }

    public function pagoCancelado()
    {
        return view('pago_cancelado');
    }
}
