<?php

namespace App\Models;

use App\Models\ProductsModels;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Str;

class ProductsBrands extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;

    protected $table = 'products_brands';

    protected $fillable = [
        'title',
        'logo',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            // Add slug for brand
            $model->slug = Str::slug($model->title);
        });
    }

    public function models()
    {
        return $this->hasMany(ProductsModels::class, 'brand_id', 'id');
    }
}
