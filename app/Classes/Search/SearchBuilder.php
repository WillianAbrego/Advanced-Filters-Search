<?php

namespace App\Classes\Search;

use Exception;
use Illuminate\Http\Request;

class SearchBuilder
{
    protected $modelName;
    protected $request;

    public function __construct($modelName, Request $request)
    {
        $this->modelName = $modelName;
        $this->request = $request;
    }

    public function filter()
    {
        $query = $this->applyFilters();
        return $query;
    }

    private function applyFilters()
    {
        $model = $this->getmodel();
        $query = $model->newQuery();
        $filters = $this->getFilters();

        foreach ($filters as $key => $filter) {
            $filterClass = __NAMESPACE__ . '\\Filters\\' . $this->modelName . '\\' . $filter;
            if (class_exists($filterClass)) {
                $query = $filterClass::apply($query, $this->request);
            }
        }
        return $query;
    }

    private function getModel()
    {
        try {
            $model = app('App\Models\\' . $this->modelName);
            return $model;
        } catch (Exception $e) {
            abort(500);
        }
    }

    private function getFilters()
    {
        $filtersName = [];
        $path = __DIR__ . '/Filters/' . $this->modelName;

        if (file_exists($path)) {
            $allfilters = scandir($path);
            $filters = array_diff($allfilters, array('.', '..'));
            foreach ($filters as $key => $filter) {
                $filtersName[] = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filter);
            }
        }
        return $filtersName;
    }
}
