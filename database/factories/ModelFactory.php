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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Employee::class, function ($faker) {
    return [
        'name' => $faker->name,
        'present_address' => $faker->streetAddress,
        'permanent_address' => $faker->streetAddress,
        'mobile' => $faker->randomNumber,
        'national_id' => $faker->randomNumber,
        'designation' => $faker->word,
        'photo' => 'photolocation',
        'raid' => $faker->randomNumber,
        'status' => true,
        'email' => $faker->email
    ];
});