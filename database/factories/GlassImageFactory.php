<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

// 画像処理に使用
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

$factory->define(App\GlassImage::class, function (Faker $faker) {
    return [
        'image' => Storage::putFile('glassess/images', new File($faker->image('/tmp', rand(200, 300), rand(200, 300), 'cats'))),
    ];
});
