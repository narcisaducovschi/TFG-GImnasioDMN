<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class ShopController extends BaseController
{
    public function tienda(): string
    {
        return view('tienda/tienda');
    }

    public function buscar(): string
    {
        $grupo = $this->request->getGet('grupo') ?? 0;
        $productoModel = new ProductoModel();

        if ($grupo == 0) {
            $productos = $productoModel->findAll();
        } else {
            $productos = $productoModel->where('grupo', $grupo)->findAll();
        }

        return view('tienda/buscar', [
            'productos' => $productos,
            'grupo'     => $grupo
        ]);
    }

    public function añadirAlCarritoAjax()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'error']);
        }

        $id = $this->request->getPost('id');
        $model = new ProductoModel();
        $producto = $model->find($id);

        if (!$producto) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'El producto no existe']);
        }


        $stripeKeyInDb = $producto['stripe'];
        $stripePriceId = PRODUCTOS_STRIPE[$stripeKeyInDb] ?? null;

        if (!$stripePriceId) {
            return $this->response->setJSON([
                'status' => 'error', 
                'message' => "Configuración de Stripe faltante para: $stripeKeyInDb"
            ]);
        }

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id])) {
            $cart[$id]['cantidad']++;
        } else {
            $cart[$id] = [
                'id'              => $producto['id'],
                'nombre'          => $producto['nombre'],
                'precio'          => $producto['precio'],
                'stripe_price_id' => $stripePriceId,
                'cantidad'        => 1
            ];
        }

        session()->set('cart', $cart);
        $totalItems = array_sum(array_column($cart, 'cantidad'));

        return $this->response->setJSON([
            'status'     => 'success',
            'totalItems' => $totalItems
        ]);
    }

    public function getCartJson()
    {
        $cart = session()->get('cart') ?? [];
        return $this->response->setJSON(['cart' => $cart]);
    }

    public function updateCart()
    {
        $id = $this->request->getPost('id');
        $action = $this->request->getPost('action');
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id])) {
            if ($action == 1) {
                $cart[$id]['cantidad']++;
            } elseif ($action == -1) {
                $cart[$id]['cantidad']--;
                if ($cart[$id]['cantidad'] <= 0) {
                    unset($cart[$id]);
                }
            } elseif ($action == 'remove') {
                unset($cart[$id]);
            }
        }

        session()->set('cart', $cart);
        $totalItems = array_sum(array_column($cart, 'cantidad'));

        return $this->response->setJSON([
            'status'     => 'success',
            'totalItems' => $totalItems
        ]);
    }
}