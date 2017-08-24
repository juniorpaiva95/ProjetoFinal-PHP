<?php

/*
|--------------------------------------------------------------------------
| Entities Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Entities factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Entities\Livro::class, function (\Faker\Generator $faker) {
    return [
        'titulo' => $faker->catchPhrase,
        'editora' => $faker->company,
        'isbn' => $faker->isbn10,
        'paginas' => $faker->numberBetween($min = 100, $max = 500),
        'ano' => $faker->numberBetween($min = 1990, $max = 2017),
        'assunto' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});