<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Fuel_Types;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

use Faker\Generator as Faker;
 
$factory->define(App\Fuel_Types::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->type_name,
    ];
});
