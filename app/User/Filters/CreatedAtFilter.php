<?php

namespace App\User\Filters;

use Ccantimbuhan\LaravelFilters\Filters\BaseFilter;
use Ccantimbuhan\LaravelFilters\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;

class CreatedAtFilter extends BaseFilter
{
    public static function apply(Builder $query, $value): Builder
    {
        return Filters::rangeFilter($query, 'created_at', $value);
    }
}
