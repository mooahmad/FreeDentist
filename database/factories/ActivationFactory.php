<?php

use App\Users\Domain\Models\Activation;
use App\Users\Domain\Models\Dentist;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Activation::class, function (Faker $faker) {
    return [
        'token' => Str::random(32),
        'user_id' => function () {
            return factory(Dentist::class)->create()->id;
        },
    ];
});

$factory->state(Activation::class, 'completed', function ($faker) {
    return [
        'completed_at' => now(),
    ];
});
