<?php

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

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'role_id' => random_int(1,10),
        'fio' => str_random(10),
        'create_id' => random_int(1,10),
        'name' => $faker->name,
        'status_id' => random_int(1,10),
    ];
});
