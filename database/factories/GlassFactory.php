<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Brand;

use Faker\Generator as Faker;

$factory->define(App\Glass::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(rand(10, 255)),
        'price' => rand(1000, 100000),
        'url' => $faker->url,
        'lens_width' => $faker->numberBetween(40, 60),
        'lens_height' => $faker->optional()->numberBetween(10, 30),
        'bridge_width' => $faker->numberBetween(10, 30),
        'temple_length' => $faker->numberBetween(100, 170),
        'frame_width' => $faker->optional()->numberBetween(100, 150),
        // 投稿者はUserシーダーからのリレーションで設定するので不要
        // 投稿者をランダムに取得
        // pluckはクエリビルダでも使用可
        // 'user_id' => \DB::table('users')->pluck('id')->random(),
        // 'user_id' => User::pluck('id')->random(),
        // ブランドをランダムに取得
        // ブランドを取得するのでブロンドシーダーを、このファクトリーを使用するシーダーより先にコールしとかないとエラーに
        'brand_id' => Brand::pluck('id')->random(),
    ];
});
