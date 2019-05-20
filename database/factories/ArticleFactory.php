<?php

use Faker\Generator as Faker;
use Carbon\Carbon;


$factory->define(App\Article::class, function (Faker $faker) { //
    return [ // fakerを使ってダミーデータ作成
        'title' => $faker->sentence(),
        'body' => $faker->paragraph(),
        'published_at' => Carbon::today(),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
