<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(App\Entities\Contact::class, function (Faker $faker) {
    return [
        'nome' => $faker->firstName,
        'sobrenome' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'telefone' => $faker->unique()->phoneNumber,
    ];
});
