<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductsSpecification extends Model
{
    use LogsActivity;

    protected $table = 'products_specification';

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;

    protected $fillable = [
        'product_id',
        'title',
        'value'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'id', 'product_id');
    }
}
