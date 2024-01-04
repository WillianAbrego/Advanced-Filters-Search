<?php

namespace App\Classes\Search\Property;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertySearch
{
    public function filter(Request $request)
    {
        $query = (new Property)->newQuery();
        $filters = $this->getFilters();
        dd($filters);
        return $query;
    }

    public function getFilters()
    {
        $allfilters = scandir(app_path('/Classes/Search/Property/Filters'));
        $filters = array_diff($allfilters, array('.', '..'));
        $filtersName = [];
        foreach ($filters as $key => $filter) {
            $filtersName[] = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filter);
        }
        return $filtersName;
    }
}
