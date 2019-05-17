<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductsModels extends Model
{
    use LogsActivity;

    protected $table = 'products_models';

    protected $fillable = [
        'title',
        'brand_id'
    ];
}
