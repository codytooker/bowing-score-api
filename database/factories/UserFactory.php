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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Game::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'user_id' => function () {
            return factory('App\User')->make()->id;
        },
    ];
});

$factory->define(App\Frame::class, function (Faker $faker) {
    return [
        'game_id' => function () {
            return factory('App\Game')->make()->id;
        },
        'number' => $faker->numberBetween(1, 10),
        'throw_1' => json_encode([1,2,3]),
        'throw_2' => json_encode([4,5,6]),
    ];
});
