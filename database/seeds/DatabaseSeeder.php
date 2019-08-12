<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seed_classes = [
            UsersTableSeeder::class,
        ];
        var_dump(App::environment());
        if( App::environment() === 'local' )
        {
            $seed_classes[] = MasterProductsSeeder::class;
        }
        $this->call($seed_classes);
    }
}
