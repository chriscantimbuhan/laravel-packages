<?php

namespace App\User\Filters;

use Ccantimbuhan\LaravelFilters\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

class RoleFilter extends BaseFilter
{
    public static function apply(Builder $query, $value): Builder
    {
        return $query->whereHas('userRole', function ($query) use ($value) {
            $query->whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($value) . '%']);
        });
    }
}
