<?php

namespace App\Services;


class SearchUtils
{
    public function parser($params = [])
    {
        $querySearch = "?";
        $arrayQuerySearch = [];
        foreach ($params as $k => $item) {
            if ($k === "limit") {
                continue;
            }
            $arrayQuerySearch[] = $k . "=" . $item;
        }
        $querySearch .= implode("&", $arrayQuerySearch);

        return $querySearch;
    }


    public function getFilters($products = [])
    {
        $filters = [];
        $selFilters = $products->filters;
        foreach ($selFilters as $filter) {
            $filters[] = ['id' => $filter->id, "name" => $filter->name, "value" => $filter->values[0]->name];
        }

        return $filters;
    }
}