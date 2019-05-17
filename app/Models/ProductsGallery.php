<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductsGallery extends Model
{
    use LogsActivity;

    protected $table = 'products_gallery';

    protected $fillable = [
        'product_id',
        'label',
        'picture',
        'sort'
    ];

    public static function store(array $source)
    {
        $file_path = basename(Storage::put('public', $source['resource']));
        return parent::create([
            'product_id' => $source['product_id'],
            'picture' => $file_path,
            'label' => (isset($source['label']) ? $source['label'] : null)
        ])->id;
    }

    public function delete()
    {
        Storage::delete($this->filename);
        return parent::delete();
    }
}
