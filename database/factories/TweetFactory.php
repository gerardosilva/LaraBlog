<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use App\User;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
     return [
        'tweet_id' => $faker->sentence(3),
        'text' => $faker->text(100),
        'available' => true,
        'tweet_created_at' => $faker->date('D M d H:i:s O Y', 'now'),
        'user_id' => factory(User::class),
    ];
});
