<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductsOptionGroup extends Model
{
    use LogsActivity;

    protected $table = 'products_option_group';

    protected $fillable = [
        'product_id',
        'title'
    ];

    public function items()
    {
        return $this->hasMany(ProductsOption::class, 'group_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'id', 'product_id');
    }
}
