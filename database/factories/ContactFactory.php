<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Contact::class, function (Faker $faker) {
    return [
        'first_name'    => $faker->firstName(),
        'last_name'     => $faker->lastName(),
        'birth_date'    => $faker->dateTimeThisCentury->format('Y-m-d'),
        'email'         => $faker->unique()->safeEmail,
        'city'          => $faker->city(),
        'company'       => $faker->company(),
        'phone'         => $faker->phoneNumber(),
        'address'       => $faker->address(),
        'function'      => $faker->jobTitle(),
    ];
});
