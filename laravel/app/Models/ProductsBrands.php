<?php

namespace App\Model;

use App\Models\ProductsModels;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductsBrands extends Model
{
    use LogsActivity;

    protected $table = 'products_brands';

    protected $fillable = [
        'title',
        'logo'
    ];

    public function models()
    {
        return $this->hasMany(ProductsModels::class, 'brand_id', 'id');
    }
}
