<?php

namespace App\Classes\Search\Property;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertySearch
{
    public function filter(Request $request)
    {
        $query = (new Property)->newQuery();
        $query = $this->applyFilters($query, $request);
        return $query;
    }

    private function applyFilters($query, $request)
    {
        $filters = $this->getFilters();
        foreach ($filters as $key => $filter) {
            $filterClass = __NAMESPACE__ . '\\Filters\\' . $filter;
            if (class_exists($filterClass)) {
                $query = $filterClass::apply($query, $request);
            }
        }
        return $query;
    }

    private function getFilters()
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
