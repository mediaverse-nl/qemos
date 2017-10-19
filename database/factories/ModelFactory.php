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

use Faker\Factory;

$faker = Factory::create('nl_NL');


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

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'role' => \App\Role::UserRoles()->random(),
    ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {
    return [
        'adres' => $faker->address,
        'postcode' => $faker->postcode,
        'stad' => $faker->city,
        'lang' => $faker->countryCode,
        'api_key' => str_random(30),
        'kvk' => str_random(9),
        'btw' => $faker->vat(false),
        'status' => array_random(\App\Location::status()->toArray()),
    ];
});

$factory->define(App\UserLocation::class, function (Faker\Generator $faker) {
    return [
        'location_id' => array_random(\App\Location::pluck('id')->toArray()),
        'user_id' => array_random(\App\User::pluck('id')->toArray()),
    ];
});

$factory->define(App\Kiosk::class, function (Faker\Generator $faker) {
    return [
        'api_key' => str_random(14),
        'location_id' => array_random(\App\Location::pluck('id')->toArray()),
        'model_nr' => str_random(9),
        'status' => array_random(\App\Kiosk::status()),
    ];
});

$factory->define(App\UserRole::class, function (Faker\Generator $faker) {
    return [
        'role_id' => array_random(\App\Role::pluck('id')->toArray()),
        'user_id' => array_random(\App\User::pluck('id')->toArray()),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'menu_id' => array_random(\App\Menu::pluck('id')->toArray()),
        'location_id' => array_random(\App\Location::pluck('id')->toArray()),
        'naam' => $faker->words(4, true),
        'beschrijving' => $faker->realText(250),
        'prijs' => random_int(1, 200).'.'.random_int(10, 99),
        'bereidingsduur' => random_int(1, 200),
//        'status' => array_rand(array('zichtbaar' => 'zichtbaar', 'verwijdert', 'verschuilen')),
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
        'user_id' => array_random(\App\User::pluck('id')->toArray()),
//        'tafel_id' => array_rand(\App\Location::pluck('id')->toArray()),
        'location_id' => array_random(\App\Location::pluck('id')->toArray()),
        'prijs' => random_int(1, 200).'.'.random_int(10, 99),
        'korting' => array_random([0, 0, 0, 100, 0,0,30,0,0,0,0,0,0,20,0,0,10,0,0,0]),
//        'mollie_id' => array_rand(\App\Kiosk::status()),
        'payment_method' => array_random(['pin'=> 'pin', 'ideal'=> 'ideal', 'contant'=> 'contant', 'paypal'=> 'paypal', 'bitcoin'=> 'bitcoin']),
        'status' => array_random(['open' => 'open','cancelled' => 'cancelled','pending' => 'pending','failed' => 'failed','paid' => 'paid']),
    ];
});

