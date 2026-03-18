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
        return $this->generarTienda();
    }

    public function generarTienda(): string
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
            'grupo' => $grupo
        ]);
    }
}
