<?php

namespace App\Classes\Search\Property\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserFilter
{
    public static function apply(Builder $query, Request $request)
    {
        if ($request->user) {
            $query->where('user_id', $request->user);
        }
        return $query;
    }
}
