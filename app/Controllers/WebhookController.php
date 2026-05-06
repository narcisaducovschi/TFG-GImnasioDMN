<?php

namespace App\Controllers;

use App\Models\UserModel;
use Stripe\Webhook;

class WebhookController extends BaseController
{
    public function index()
    {
        \Stripe\Stripe::setApiKey(STRIPE_SECRET);

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sig_header,
                'whsec_3f79ecb15dacc831e30b7a05be30cc8c8926dc10c08ae966c04268b9072e55c5'
            );
        } catch (\Exception $e) {
            return $this->response->setStatusCode(400);
        }

        $userModel = new UserModel();

        switch ($event->type) {
            case 'customer.subscription.updated':
                $subscription = $event->data->object;
                $customerId = $subscription->customer;
                $priceId = $subscription->items->data[0]->price->id;

                $planes = [
                    PLANES['PLAN_BASICO']  => 2,
                    PLANES['PLAN_PREMIUM'] => 3
                ];

                if (isset($planes[$priceId])) {
                    $userModel->where('stripe_customer_id', $customerId)
                        ->set(['id_suscripcion' => $planes[$priceId]])
                        ->update();
                }
                break;
            case 'customer.subscription.deleted':
                $subscription = $event->data->object;
                $customerId = $subscription->customer;
                $userModel->where('stripe_customer_id', $customerId)->delete();
                log_message('info', "Usuario con Stripe ID {$customerId} eliminado por cancelación.");
                break;
        }

        return $this->response->setStatusCode(200);
    }
}
