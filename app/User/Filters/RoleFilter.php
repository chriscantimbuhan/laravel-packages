<?php

namespace App\User\Filters;

use App\Models\UserRole;
use Ccantimbuhan\LaravelFilters\Contracts\Optionable;
use Ccantimbuhan\LaravelFilters\Filters\BaseFilter;
use Ccantimbuhan\LaravelFilters\Helpers\FilterHelper;
use Illuminate\Database\Eloquent\Builder;

class RoleFilter extends BaseFilter implements Optionable
{
    public static function apply(Builder $query, $value): Builder
    {
        return $query->whereHas('userRole', function ($query) use ($value) {
            $query->whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($value) . '%']);
        });
    }

    public static function options()
    {
        return FilterHelper::resolveOptions([
            'options_from' => function () {
                return 
                    UserRole::pluck('name', 'id')->toArray();
            }
        ]);
    }
}
