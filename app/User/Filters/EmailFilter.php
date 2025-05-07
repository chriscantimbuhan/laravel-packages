<?php

namespace App\User\Filters;

use Ccantimbuhan\LaravelFilters\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

class EmailFilter extends BaseFilter
{
    public static function apply(Builder $query, $value): Builder
    {
        return $query->where('email', 'LIKE', "%$value%");
    }
}
