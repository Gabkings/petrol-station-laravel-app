<?php

use Illuminate\Database\Seeder;

class Fuel_TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        factory(App\Fuel_Types::class, 10)->create();
    }
}
