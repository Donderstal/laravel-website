<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 5/10/19
 * Time: 2:07 PM
 */

namespace App\Utilities;


use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

class ImageUtil
{

    protected $imageSource;

    public function routes()
    {
        Route::group(['prefix' => 'image', 'as' => 'image.', 'namespace' => '\App\Utilities'], function () {
            Route::get('/{filename}', 'ImageUtil@showOriginal')->name('original');

            Route::get('/{action}/{filename}', 'ImageUtil@showWithAction')->name('action')
                ->where('action', implode('|', array_keys(config('site.image.actions'))));
        });
    }

    public function showWithAction($action, $filename)
    {
        if (method_exists($this, 'show' . $action)) {
            return $this->{'show' . $action}($filename);
        }

        return $this->makeFitImage($this->getImagePath($filename),
            config('site.image.actions')[$action])->response();

    }

    public function showAvatar($filename)
    {
        if ($this->isExists($filename)) {
            $filepath = $this->getImagePath($filename);
        } else {
            $filepath = base_path(config('site.user.default_avatar_path'));
        }

        return $this->makeFitImage($filepath, config('site.image.size.avatar'))->response();
    }


    public function showOriginal($filename)
    {
        return $this->makeImage($this->getImagePath($filename))->response();
    }

    public function makeFitImage($filename, $size)
    {
        if (!is_array($size)) {
            $size = explode('x', $size);
        }

        return $this->imageSource = Image::cache(function ($image) use ($filename, $size) {
            $image->make($filename);
            $image->fit($size[0], $size[1]);
        }, config('site.image.cache'), true);

    }

    public function makeImage($filename)
    {
        return $this->imageSource = Image::make($filename);
    }

    public function returnImage()
    {
        return $this->imageSource->response();
    }

    public function getImagePath($filename)
    {
        return storage_path('app/public/') . $filename;
    }

    public function isExists($filename)
    {
        return file_exists($this->getImagePath($filename));
    }
}