<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductsColors extends Model
{
    use LogsActivity;

    protected $table = 'products_colors';

    protected $fillable = [
        'title'
    ];
}
