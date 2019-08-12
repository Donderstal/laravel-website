<?php

use Illuminate\Database\Seeder;

class MasterProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            'white',
            'black',
            'sliver'
        ];
        $colors_created = [];
        foreach($colors as $color) {
            $color = App\Models\ProductsColors::create([
                'title' => $color
            ]);
            $colors_created[] = $color;
        }

        $brands = [
            'Bugatti' => [
                [ 'title' =>  'Bugatti 800'],
                [ 'title' => 'Bugatti 900'],
                [ 'title' => 'Bugatti Very Large']
            ],
            'Ferrari' => [
                [ 'title' =>  'Ferrari 1'],
                [ 'title' =>  'Ferrari DS'],
                [ 'title' =>  'Ferrari Nice']
            ],
            'Mercedes' => [
                [ 'title' => 'Mercedes McLaren'] ,
                [ 'title' => 'Mercedes M Class'],
                [ 'title' => 'Mercedes Decadence XXL']
            ]
        ];
        $brand_objs = [];
        foreach($brands as $brand_name => $models_list) {
            $brand = App\Models\ProductsBrands::create([
                'title' => $brand_name
            ]);
            $brand->models()->createMany($models_list);
            $brand_objs[] = $brand;
        }
        var_dump('fdsf');

        $cars = [
            [
                'title' => 'Bugatti awesome',
                'price' => 100000,
                'mileage' => 9,
                'year' => 2019,
                'fuel' => 'diesel',
                'transmission' => 'at',
                'color_id' => 1,
                'brand_id' => 1,
                'model_id' => 3,
                'status' => 'coming_soon',
                'enable' => 1
            ],
            [
                'title' => 'Farrari awesome',
                'price' => 100001,
                'mileage' => 123,
                'year' => 2018,
                'fuel' => 'diesel',
                'transmission' => 'at',
                'color_id' => 2,
                'brand_id' => 2,
                'model_id' => 1,
                'status' => 'sold',
                'enable' => 1
            ],
            [
                'title' => 'Mercedes awesome',
                'price' => 100001,
                'mileage' => 123,
                'year' => 2018,
                'fuel' => 'diesel',
                'transmission' => 'at',
                'color_id' => 3,
                'brand_id' => 3,
                'model_id' => 1,
                'status' => 'available',
                'enable' => 1
            ]
        ];
        foreach($cars as $car_spec) {
            $car = App\Models\Products::create($car_spec);
            $car->slug()->create([
                'slug' => Str::slug($car_spec['title']),
                'default' => true
            ]);
        }
    }
}
