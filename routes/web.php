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

Route::get('/', 'LandingPageController@index')->name('landing-page');

Auth::routes([
    'register' => (App::environment() == 'local' ? true : false)
]);

ImageUtil::routes();

$brands_list = ProductsBrands::getAllBrandsInOrderQuery()->get();
$brands_slugs = ProductsBrands::getAllSlugs($brands_list);
$brands_slug_regex = implode($brands_slugs, '|');
Route::group(['prefix' => config('site.products.url'), 'as' => 'products.'], function () use ($brands_slug_regex){
    Route::get('/', 'ProductsController@list')->name('listAll');
    Route::get('{status}/{brand?}', 'ProductsController@list')->name('list')->where(['status' => 'aanbod|verkocht', 'brand' => $brands_slug_regex]);
    Route::get('{slug}', 'ProductsController@show')->name('show');
});

Route::post('/emails/post-call-me-form', 'EmailsController@callMeForm')->name('call-me-form');
Route::post('/emails/newsletter-form', 'EmailsController@newsLetterForm')->name('newsletter-form');
Route::post('/emails/contact-form', 'EmailsController@contactForm')->name('contact-form');

Route::get('/werkplaats', 'GeneralInfoController@werkplaats')->name('werkplaats');
Route::get('/financiering', 'GeneralInfoController@financiering')->name('financiering');
Route::get('/zoektocht', 'GeneralInfoController@zoektocht')->name('zoektocht');
Route::get('/over-ons', 'GeneralInfoController@overOns')->name('over-ons');
Route::get('/contact', 'GeneralInfoController@contact')->name('contact');
