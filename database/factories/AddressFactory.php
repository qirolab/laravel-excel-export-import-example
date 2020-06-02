<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use App\User;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'country' => $faker->country
    ];
});