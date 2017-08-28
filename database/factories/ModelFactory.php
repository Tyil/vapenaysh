<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Flavour;
use App\Mix;
use App\MixComment;
use App\MixFlavour;
use App\User;
use Faker\Generator;

$factory->define(Flavour::class, function (Generator $faker) {
    return [
        'name' => "{$faker->colorName} {$faker->word}",
        'brand' => $faker->company,
        'description' => $faker->paragraphs(rand(1, 2), true),
        'link' => $faker->safeEmailDomain,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Mix::class, function (Generator $faker) {
    return [
        'name' => $faker->words(2, true),
        'description' => $faker->paragraphs(rand(1, 3), true),
        'created_by' => User::inRandomOrder()->first()->id,
    ];
});

$factory->define(MixComment::class, function (Generator $faker) {
    return [
        'mix_id' => Mix::inRandomOrder()->first()->id,
        'body' => $faker->paragraphs(rand(2, 6), true),
        'created_by' => User::inRandomOrder()->first()->id,
    ];
});

$factory->define(MixFlavour::class, function (Generator $faker) {
    return [
        'mix_id' => Mix::inRandomOrder()->first()->id,
        'flavour_id' => Flavour::inRandomOrder()->first()->id,
        'units' => $faker->randomDigitNotNull,
        'nicotine' => $faker->randomFloat(2, 0, 12),
    ];
});
