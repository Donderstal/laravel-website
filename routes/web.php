<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Facades\ImageUtil;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => (App::environment() == 'local' ? true : false)
]);

ImageUtil::routes();

Route::group(['prefix' => config('site.products.url'), 'as' => 'products.'], function () {
    Route::get('/', 'ProductsController@all')->name('show');
    Route::get('{slug}', 'ProductsController@show')->name('show');
});

Route::get('search', 'SearchController@index')->name('search');