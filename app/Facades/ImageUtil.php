<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 5/10/19
 * Time: 2:11 PM
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class ImageUtil extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ImageUtil';
    }
}