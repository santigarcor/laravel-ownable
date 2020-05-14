<?php

use Faker\Generator as Faker;

$factory->define(Ownable\Tests\Models\User::class, function (Faker $faker) {
    return ['name' => $faker->name];
});

$factory->define(Ownable\Tests\Models\Post::class, function (Faker $faker) {
    return ['name' => $faker->name];
});

$factory->define(Ownable\Tests\Models\Other::class, function (Faker $faker) {
    return ['name' => $faker->name];
});
