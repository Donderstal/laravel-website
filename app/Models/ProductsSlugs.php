<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductsSlugs extends Model
{
    use LogsActivity;

    protected $table = 'products_slugs';

    protected $fillable = [
        'product_id',
        'slug',
        'default'
    ];
}
