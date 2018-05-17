<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'projectName' => $faker->company,
        'descriptive' => $faker->text,
        'authorName'=>$faker->lastName,
    ];
});
