<?php

namespace App\Models;

use App\Models\ProductsBrands;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Products extends Model
{
    use LogsActivity;
    use SearchableTrait;

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;

    protected static $ignoreChangedAttributes = [
        'visits',
    ];

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
        'created_by',
        'status',
        'enable',
        'is_coming_soon',
        'visits'
    ];

    protected $searchable = [
        'columns' => [
            'products.title' => 1,
            'products.note' => 3,
            'products_brands.title' => 2,
            'products_models.title' => 2,
        ],
        'joins' => [
            'products_brands' => ['products.brand_id','products_brands.id'],
            'products_models' => ['products.model_id','products_models.id'],
        ],
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            // Add slug for product
            $model->slug()->create([
                'slug' => Str::slug($model->title),
                'default' => true
            ]);
        });
    }

    public function delete() {
        try {
            \DB::transaction(function()
            {
                $this->update(['cover_id' => null]);
                $this->gallery()->delete();
                $this->slug()->delete();
                $this->options()->delete();
                $this->specification()->delete();
                $this->services()->delete();
                throw new \Exception('problem');
                parent::delete();
            });
        } catch (\Exception $e) {
            flash_message('Could not delete this product for unknown error', 'error');

        }
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
        $non_soft_deleted_user = $this->belongsTo(User::class, 'created_by', 'id');
        if($non_soft_deleted_user) {
            return $non_soft_deleted_user;
        }

        return $this->created_by;
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

    public function isComingSoon() {
        return $this->is_coming_soon;
    }
}
