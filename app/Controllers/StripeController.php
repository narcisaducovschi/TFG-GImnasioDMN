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
                return "ERROR CRÍTICO: El producto '".$item['nombre']."' no tiene un Price ID válido. El valor obtenido fue: " . var_export($priceId, true) . ". Revisa tu archivo .env y constantes.";
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

    public function pagoTiendaExito()
    {
        session()->remove('cart');
        return view('tienda/pago_exito');
    }
}