<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Contact;
use App\Message;
use Faker\Generator as Faker;

$factory->define(App\Entities\Message::class, function (Faker $faker) {
    $contacts = Contact::all()->pluck('id')->toArray();

    return [
        'descricao' => $faker->text(),
        'contact_id'=> $faker->randomElement($contacts),
    ];
});
