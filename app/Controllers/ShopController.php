<?php

namespace App\Controllers;

class ShopController extends BaseController
{
    public function tienda(): string
    {
        return view('tienda/tienda');
    }
        public function buscar(): string
    {
        return view('tienda/buscar');
    }

    /**
     * Devuelve toda la tienda y hace la tabla
     */
    public function generarTienda() 
    {
        
    }
}
