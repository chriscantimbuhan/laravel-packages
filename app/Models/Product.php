<?php

namespace App\Models;

use Ccantimbuhan\LaravelAuditLogs\Traits\HasAuditLog;
use Ccantimbuhan\LaravelMedia\Traits\HasMedia;
use Ccantimbuhan\LaravelRatings\Traits\HasRatings;
use Ccantimbuhan\LaravelTags\Contracts\Taggable;
use Ccantimbuhan\LaravelTags\Traits\HasTags;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Taggable
{
    use HasTags;
    use HasRatings;
    use HasMedia;
    use HasAuditLog;

    const ROUTE_KEY = 'product';
}
