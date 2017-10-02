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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'location_id' => 1,
    ];
});

//$factory->define(App\Role::class, function (Faker\Generator $faker) {
//    return [
//        'role' => \App\Role::UserRoles()->random(),
//        'user_id' => $faker->numberBetween(1, 10),
//    ];
//});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'role' => \App\Role::UserRoles()->random(),
    ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {
    return [
        'adres' => $faker->address,
        'location_id' => 1,
        'postcode' => $faker->postcode,
        'stad' => $faker->city,
        'lang' => $faker->countryCode,
        'btw' => $faker->cvr,
        'kvk' => $faker->vat(false),
    ];
});

$factory->define(App\Kiosk::class, function (Faker\Generator $faker) {
    return [
        'api_key' => str_random(14),
        'location_id' => $faker->numberBetween(1, 10),
        'model_nr' => str_random(2),
        'status' => array_rand(\App\Kiosk::status()),
    ];
});
