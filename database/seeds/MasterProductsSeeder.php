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
        foreach($colors as $color) {
            $color = App\Models\ProductsColors::create([
                'title' => $color
            ]);
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
        foreach($brands as $brand_name => $models_list) {
            $brand = App\Models\ProductsBrands::create([
                'title' => $brand_name
            ]);
            $brand->models()->createMany($models_list);
        }

    }
}
