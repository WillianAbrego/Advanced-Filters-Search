<?php

namespace App\Classes\Search\Property;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertySearch
{
    public function filter(Request $request)
    {
        $query = (new Property)->newQuery();
        if ($request->id) {
            $query->where('id', $request->id);
        }

        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->features) {
            $query->whereHas('features', function ($q) use ($request) {
                $q->whereIn('features.id', $request->features);
            });
        }
        return $query;
    }
}
