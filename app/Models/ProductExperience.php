<?php

namespace App\Models;

use Ccantimbuhan\LaravelTags\Contracts\Taggable;
use Ccantimbuhan\LaravelTags\Traits\HasTags;
use Illuminate\Database\Eloquent\Model;

class ProductExperience extends Model implements Taggable
{
    use HasTags;

    const ROUTE_KEY = 'product_experience';
}
