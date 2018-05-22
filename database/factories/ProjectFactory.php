<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) use($factory) {
    return [
        'projectName' => $faker->company,
        'descriptive' => $faker->text,
        'user_id'=> $factory->create(App\User::class)->id,

    ];
});
