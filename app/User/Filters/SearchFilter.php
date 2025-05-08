<?php

namespace App\User\Filters;

use Ccantimbuhan\LaravelFilters\Filters\BaseFilter;
use Ccantimbuhan\LaravelFilters\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;

class SearchFilter extends BaseFilter
{
    public static function apply(Builder $query, $value): Builder
    {
        return Filters::searchFilter($query, $value, config('user.search_fields'));
    }
}
