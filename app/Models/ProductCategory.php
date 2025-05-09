<?php

namespace App\Models;

use Ccantimbuhan\LaravelTags\Contracts\Taggable;
use Ccantimbuhan\LaravelTags\Traits\HasTags;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model implements Taggable
{
    use HasTags;

    const ROUTE_KEY = 'product_category';
}
