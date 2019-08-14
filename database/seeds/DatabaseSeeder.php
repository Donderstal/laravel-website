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
        if( env('DB_DEV_SEED') === true )
        {
            $seed_classes[] = MasterProductsSeeder::class;
        }
        $this->call($seed_classes);
    }
}
