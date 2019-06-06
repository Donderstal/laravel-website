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

Route::get('/', 'DashboardController@index')->name('dashboard');

// Users routes
Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/', 'UserController@index')->name('index');

    Route::get('/create', 'UserController@create')->name('create');
    Route::post('/create', 'UserController@store');

    Route::get('/edit/{user}', 'UserController@edit')->name('edit');
    Route::put('/edit/{user}', 'UserController@update');

    Route::delete('/delete/{user}', 'UserController@delete')->name('delete');
});

// Products routes
Route::group(['prefix' => 'products', 'as' => 'products.', 'namespace' => 'Products'], function () {
    Route::get('/', 'ProductsController@index')->name('index');

    Route::get('/create', 'ProductsController@create')->name('create');
    Route::post('/create', 'ProductsController@store');

    Route::get('/edit/{product}', 'ProductsController@edit')->name('edit');
    Route::put('/edit/{product}', 'ProductsController@update');

    Route::delete('/delete/{product}', 'ProductsController@delete')->name('delete');

    Route::get('/get_models/{brand_id?}', 'ProductsController@getModels')->name('get_models');

    // Products gallery routes
    Route::group(['prefix' => '{product}/gallery', 'as' => 'gallery.'], function () {
        Route::get('/', 'ProductsGalleryController@index')->name('index');
        Route::post('/', 'ProductsGalleryController@store');

        Route::delete('/delete/{picture}', 'ProductsGalleryController@delete')->name('delete');

        Route::put('/sort', 'ProductsGalleryController@sort')->name('sort');
        Route::get('/cover/{picture}', 'ProductsGalleryController@cover')->name('cover');
    });

    // Products options routes
    Route::group(['prefix' => '{product}/option', 'as' => 'option.'], function () {
        Route::get('/', 'ProductsOptionsGroupController@index')->name('index');
        Route::post('/', 'ProductsOptionsGroupController@store');

        Route::get('/edit/{group}', 'ProductsOptionsGroupController@edit')->name('edit');
        Route::put('/edit/{group}', 'ProductsOptionsGroupController@update');

        Route::delete('/delete/{group}', 'ProductsOptionsGroupController@delete')->name('delete');

        Route::group(['prefix' => '{group}/items', 'as' => 'items.'], function () {
            Route::get('/', 'ProductsOptionsController@index')->name('index');
            Route::post('/', 'ProductsOptionsController@store');

            Route::get('/edit/{option}', 'ProductsOptionsController@edit')->name('edit');
            Route::put('/edit/{option}', 'ProductsOptionsController@update');

            Route::delete('/delete/{option}', 'ProductsOptionsController@delete')->name('delete');

        });
    });

    // Define specification routes
    Route::group(['prefix' => '{product}/specification', 'as' => 'specification.'], function () {
        Route::get('/', 'ProductsSpecificationController@index')->name('index');
        Route::post('/', 'ProductsSpecificationController@store');

        Route::get('/edit/{specification}', 'ProductsSpecificationController@edit')->name('edit');
        Route::put('/edit/{specification}', 'ProductsSpecificationController@update');

        Route::delete('/delete/{specification}', 'ProductsSpecificationController@delete')->name('delete');

        Route::get('/get-specs-title', 'ProductsSpecificationController@getSpecTitle')->name('get_title');
    });

    // Define services routes
    Route::group(['prefix' => '{product}/services', 'as' => 'services.'], function () {
        Route::get('/', 'ProductsServicesController@index')->name('index');
        Route::post('/', 'ProductsServicesController@store');

        Route::get('/edit/{service}', 'ProductsServicesController@edit')->name('edit');
        Route::put('/edit/{service}', 'ProductsServicesController@update');

        Route::delete('/delete/{service}', 'ProductsServicesController@delete')->name('delete');
    });

    // Define Product colors routes
    Route::group(['prefix' => 'colors', 'as' => 'colors.'], function () {
        Route::get('/', 'ProductsColorsController@index')->name('index');
        Route::post('/', 'ProductsColorsController@store');

        Route::get('/edit/{color}', 'ProductsColorsController@edit')->name('edit');
        Route::put('/edit/{color}', 'ProductsColorsController@update');

        Route::delete('/delete/{color}', 'ProductsColorsController@delete')->name('delete');
    });

    // Define Product brands routes
    Route::group(['prefix' => 'brands', 'as' => 'brands.'], function () {
        Route::get('/', 'ProductsBrandsController@index')->name('index');
        Route::post('/', 'ProductsBrandsController@store');

        Route::get('/edit/{brand}', 'ProductsBrandsController@edit')->name('edit');
        Route::put('/edit/{brand}', 'ProductsBrandsController@update');

        Route::delete('/delete/{brand}', 'ProductsBrandsController@delete')->name('delete');

        // Define Product models routes
        Route::group(['prefix' => '{brand}/models', 'as' => 'models.'], function () {
            Route::get('/', 'ProductsModelsController@index')->name('index');
            Route::post('/', 'ProductsModelsController@store');

            Route::get('/edit/{model}', 'ProductsModelsController@edit')->name('edit');
            Route::put('/edit/{model}', 'ProductsModelsController@update');

            Route::delete('/delete/{model}', 'ProductsModelsController@delete')->name('delete');
        });

    });


});