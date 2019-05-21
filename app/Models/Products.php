<?php

namespace App\Models;

use App\Model\ProductsBrands;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class Products extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;

    protected $fillable = [
        'title',
        'note',
        'cover_id',
        'price',
        'mileage',
        'year',
        'transmission',
        'fuel',
        'color_id',
        'brand_id',
        'model_id',
        'user_id',
        'status',
        'enable'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });
    }

    public function cover()
    {
        return $this->belongsTo(ProductsGallery::class, 'cover_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(ProductsBrands::class, 'brand_id', 'id');
    }

    public function model()
    {
        return $this->belongsTo(ProductsModels::class, 'model_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(ProductsColors::class, 'color_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function setCover($resource)
    {
        if ($resource instanceof \Illuminate\Http\UploadedFile) {
            $cover_id = ProductsGallery::store([
                'resource' => $resource,
                'product_id' => $this->id
            ]);
        } elseif (is_numeric($resource)) {
            $cover_id = $resource;
        } else {
            throw new \Exception('$resource is not valid.');
        }

        return $this->update(['cover_id' => $cover_id]);
    }

    public function gallery()
    {
        return $this->hasMany(ProductsGallery::class, 'product_id', 'id');
    }

    public function options()
    {
        return $this->hasMany(ProductsOptionGroup::class, 'product_id', 'id');
    }

    public function specification()
    {
        return $this->hasMany(ProductsSpecification::class, 'product_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(ProductsServices::class, 'product_id', 'id');
    }

    public function slug()
    {
        return $this->hasOne(ProductsSlugs::class, 'product_id', 'id')->where('default', true);
    }

}
