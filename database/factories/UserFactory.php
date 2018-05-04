<?php

use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Channel::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->define(App\Thread::class, function (Faker $faker) {
            $title = $faker->sentence;
    return [
        'title' => $title,
        'content'=>$faker->paragraph,
        'slug'=>str_slug($title,'-'),
        'channel_id'=>function(){return factory('App\Channel')->create()->id; },
        'user_id'=>function(){return factory('App\User')->create()->id; }
    ];
});

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'content'=>$faker->paragraph,
        'thread_id'=>function(){return factory('App\Thread')->create()->id; },
        'user_id'=>function(){return factory('App\User')->create()->id; }
    ];
});