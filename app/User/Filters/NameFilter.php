<?php

namespace App\User\Filters;

use Ccantimbuhan\LaravelFilters\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

class NameFilter extends BaseFilter
{
    public static function apply(Builder $query, $value): Builder
    {
        return $query->whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($value) . '%']);

        // return $query->where('name', 'LIKE', "'%$value%'");
    }
}
