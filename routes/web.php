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
use App\Models\ProductsBrands;
use Illuminate\Support\Facades\Schema;

Route::get('/', 'LandingPageController@index')->name('landing-page');

Auth::routes([
    'register' => (App::environment() == 'local' ? true : false)
]);

ImageUtil::routes();

if ( Schema::hasTable('products_brands') ) {
    $brands_list = ProductsBrands::getAllBrandsInOrderQuery()->get();
    $brands_slugs = ProductsBrands::getAllSlugs($brands_list);
    $brands_slug_regex = implode($brands_slugs, '|');   

    Route::group(['prefix' => config('site.products.url'), 'as' => 'products.'], function () use ($brands_slug_regex){
        Route::get('/', 'ProductsController@list')->name('listAll');
        Route::get('{status}/{brand?}', 'ProductsController@list')->name('list')->where(['status' => 'aanbod|verkocht', 'brand' => $brands_slug_regex]);
        Route::get('{slug}', 'ProductsController@show')->name('show');
        Route::post('{slug}', 'ProductsController@store')->name('store');
    });     

}




Route::get('/page1', 'GeneralInfoController@page1')->name('page1');
Route::get('/page2', 'GeneralInfoController@page2')->name('page2');
Route::get('/page3', 'GeneralInfoController@page3')->name('page3');
Route::get('/page4', 'GeneralInfoController@page4')->name('page4');

// Contact
Route::get('/contact', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');

//View privacy statement
Route::get('/privacy_statement', 'PrivacyStatementController@showPDF')->name('layouts.privacy_statement');

