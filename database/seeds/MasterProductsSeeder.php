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

        factory(App\Models\Products::class, 3)->states('sold')->create();
        factory(App\Models\Products::class, 20)->states('available')->create();
        factory(App\Models\Products::class, 3)->states('coming_soon')->create();
    }
}
