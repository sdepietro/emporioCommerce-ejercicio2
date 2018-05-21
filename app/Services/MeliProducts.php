<?php

namespace App\Services;

use App\Libreries\Meli;


class MeliProducts
{
    protected $meli;

    public function __construct(Meli $meli)
    {

        $this->meli = $meli;

    }

    public function getProducts($params = []){
        $params['limit'] = 12;

        //$meli = new Meli(env('MERCADOLIBRE_APP_KEY'), env('MERCADOLIBRE_APP_SECRET'));

        $result = $this->meli->get('/sites/MLA/search', $params);

        return $result['body'];
    }

    public function getProduct($productId = ""){
        //$meli = new Meli(env('MERCADOLIBRE_APP_KEY'), env('MERCADOLIBRE_APP_SECRET'));
        $result = $this->meli->get('/items/'.$productId, []);
        $description = $this->meli->get('/items/'.$productId.'/description', []);

        $result['body']->description = $description['body']->plain_text;

        return $result['body'];
    }
}