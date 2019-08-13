<?php

use App\Models\ProductsColors;
use App\Models\ProductsBrands;
use App\Models\ProductsGallery;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Models\Products::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'price' => 100000,
        'mileage' => 100000,
        'year' => $faker->year(),
        'fuel' => 'diesel',
        'transmission' => 'at',
        // 'cover_id' => function() {
        //     return factory(ProductsGallery::class)->create()->id;
        // },
        'color_id' => function() {
            return ProductsColors::first()->id;
        },
        'brand_id' => function() {
            $brand = ProductsBrands::first();
            return $brand->id;
        },
        'model_id' => function(array $product) {
            $brand = ProductsBrands::find($product['brand_id']);
            return $brand->models->first()->id;
        },
        'status' => 'coming_soon',
        'enable' => 1,
        'created_by' => function () {
            return factory(App\Models\User::class)->create()->id;
        }
    ];
});
