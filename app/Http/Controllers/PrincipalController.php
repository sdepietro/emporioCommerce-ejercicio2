<?php

namespace App\Http\Controllers;

use App\Services\SearchUtils;
use Illuminate\Http\Request;
use App\Libreries\Meli;
use App\Services\MeliProducts;

/**
 * Class PrincipalController
 * @package App\Http\Controllers
 */
class PrincipalController extends Controller
{

    protected $meliProducts;
    protected $searchUtils;


    /**
     * PrincipalController constructor.
     * @param MeliProducts $meliProducts
     * @param SearchUtils $searchUtils
     */
    public function __construct(MeliProducts $meliProducts, SearchUtils $searchUtils)
    {

        $this->meliProducts = $meliProducts;
        $this->searchUtils = $searchUtils;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('principal.index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
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

        $products = $this->meliProducts->getProducts($params);

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

        $product = $this->meliProducts->getProduct($productId);


        $data = [
            'product' => $product,
        ];

        return view('principal.product', $data);
    }
}