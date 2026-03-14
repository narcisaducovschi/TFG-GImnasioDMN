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
        return view('tienda/buscar');
    }

    /**
     * Devuelve todas las cards de productos
     */
    public function generarTienda()
    {
        $productoModel = new ProductoModel();

        $productos = $productoModel->findAll();

        $cards = '';

        foreach ($productos as $producto) {

            $cards .= '<div class="card" data-id="'.$producto['id'].'">';
            
            $cards .= '<div class="image-container">';
            $cards .= '<img src="'.base_url('assets/img/TIENDA/productos/'.esc($producto['imagen'])).'">';
            $cards .= '</div>';

            $cards .= '<div class="info-container">';
            $cards .= '<h2>'.esc($producto['nombre']).'</h2>';
            $cards .= '<p class="description">'.esc($producto['descripcion']).'</p>';
            $cards .= '</div>';

            $cards .= '<div class="price-section">';
            $cards .= '<span class="price">'.esc($producto['precio']).'€</span>';
            $cards .= '</div>';

            $cards .= '<button class="add-to-cart">';
            $cards .= '<img src="'.base_url('assets/img/icons/shopping-cart.svg').'">';
            $cards .= 'Añadir al carrito';
            $cards .= '</button>';

            $cards .= '</div>';
        }

        return $cards;
    }
}