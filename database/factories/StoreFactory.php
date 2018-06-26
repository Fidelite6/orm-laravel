<?php

use App\City;
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

$factory->define(App\Store::class, function (Faker $faker) {

    $city = City::find(rand(1,48000));
    $name = $faker->company;
    $data =  [
        'name'              => $name,
        'slug'              => str_slug($name).'_'.rand(1,999),
        'description'       => $faker->sentence(10),
        'street_address'    => $faker->streetName,
        'house_number'      => ucfirst($faker->randomLetter) . ' '. $faker->buildingNumber,
        'zipcode'           => $faker->postcode,
        'website'           => $faker->domainName,
        'city_id'           => $city->id,
        'state_id'          => $city->state->id,
        'country_id'        => $city->state->country->id,
    ];
    return $data;
});
