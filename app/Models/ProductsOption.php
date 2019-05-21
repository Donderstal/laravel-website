<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductsOption extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;

    protected $table = 'products_option';

    protected $fillable = [
        'group_id',
        'title'
    ];

    public function group()
    {
        return $this->belongsTo(ProductsOptionGroup::class, 'id', 'group_id');
    }
}
