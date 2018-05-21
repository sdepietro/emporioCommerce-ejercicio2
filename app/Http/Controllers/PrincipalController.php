<?php

namespace App\Http\Controllers;

use App\Services\SearchUtils;
use Illuminate\Http\Request;
use App\Libreries\Meli;
use App\Services\MeliProducts;


class PrincipalController extends Controller
{

    public function index(Request $request)
    {
        return view('principal.index');
    }

    public function search(Request $request)
    {

        if (empty($request->input('q'))) {
            return redirect('/');
        }

        $params = $request->input();

        if (!empty($request->input('remove_filter'))) {
            unset($params[$request->input('remove_filter')]);
            unset($params['remove_filter']);
        }

        $meliProducts = new MeliProducts();
        $products = $meliProducts->getProducts($params);

        $searchUtils = new SearchUtils();
        $querySearch = $searchUtils->parser($params);

        $filters = $searchUtils->getFilters($products);

        $data = [
            'items' => $products->results,
            'filters' => $products->available_filters,
            'querySearch' => $querySearch,
            'usedFilters' => $filters
        ];

        return view('principal.search', $data);
    }


    public function product(Request $request, $productId)
    {

        if (empty($productId)) {
            return redirect('/');
        }

        $params = [];

        $meli = new Meli(env('MERCADOLIBRE_APP_KEY', false), env('MERCADOLIBRE_APP_SECRET', false));
        $result = $meli->get('/items/'.$productId, $params);
        $description = $meli->get('/items/'.$productId.'/description', $params);



        $data = [
            'product' => $result['body'],
            'description' => $description['body']->plain_text,
        ];

        return view('principal.product', $data);
    }
}