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

Route::get('/', 'LandingPageController@index')->name('landing-page');

Auth::routes([
    'register' => (App::environment() == 'local' ? true : false)
]);

ImageUtil::routes();

Route::group(['prefix' => config('site.products.url'), 'as' => 'products.'], function () {
    Route::get('/list', 'ProductsController@list')->name('list');
    Route::get('/verkocht', 'ProductsController@verkocht')->name('verkocht');
    Route::get('{slug}', 'ProductsController@show')->name('show');
});

Route::get('/emails/post-call-me-form', 'EmailsController@callMeForm')->name('call-me-form');

Route::get('/werkplaats', 'GeneralInfoController@werkplaats')->name('werkplaats');    
Route::get('/financiering', 'GeneralInfoController@financiering')->name('financiering');    
Route::get('/zoektocht', 'GeneralInfoController@zoektocht')->name('zoektocht');    
Route::get('/over-ons', 'GeneralInfoController@overOns')->name('over-ons');    
Route::get('/contact', 'GeneralInfoController@contact')->name('contact');    
Route::get('/search', 'SearchController@searchForRequest')->name('search');


// Paginas:

// Home --> /home --> view('home')
// Zoek resultaten --> ?? --> view('search-results')
// Ons aanbod --> /aanbod --> view('aanbod)
// Enkel Product --> /aanbod/product --> view('view-product')
// Werkplaats --> /werkplaats --> view('general-info')->with(text)
// Financiering --> /financiering --> view('general-info')->with(financiering-text)
// Zoektocht --> /zoektocht --> view('general-info')->with(zoektocht-text)
// Over ons --> /over-ons --> view('general-info')->with(over-ons-text)
// Contact /contact --> view('general-info')->with(contact-text)

