<?php

namespace App\Services;

use App\Libreries\Meli;


class MeliProducts
{
    public function getProducts($params = []){
        $params['limit'] = 12;

        $meli = new Meli(env('MERCADOLIBRE_APP_KEY', false), env('MERCADOLIBRE_APP_SECRET', false));

        $result = $meli->get('/sites/MLA/search', $params);

        return $result['body'];
    }

    public function getProduct($productId = ""){
        $meli = new Meli(env('MERCADOLIBRE_APP_KEY', false), env('MERCADOLIBRE_APP_SECRET', false));
        $result = $meli->get('/items/'.$productId, []);
        $result['body']->description = $meli->get('/items/'.$productId.'/description', []);

        return $result['body'];
    }
}