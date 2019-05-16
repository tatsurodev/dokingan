<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;

// 画像処理に使用
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        // 10文字以内に丸める
        'username' => substr($faker->username, 0, 10),
        // sexesテーブルからラムダム
        'sex_id' => \DB::table('sexes')->pluck('id')->random(),
        // 一般ユーザーのロール
        'role_id' => \DB::table('roles')->where('role_name', 'user')->first()->id,
        'age' => rand(0, 100),
        // $faker->imageでtmpファイルに保存後、Storage::putFileでstorage/app/public以下のフォルダに保存
        'image' => Storage::putFile('users/profiles', new File($faker->image('/tmp', rand(200, 300), rand(200, 300), 'people'))),
        'comment' => $faker->realText(rand(10, 255)),
        'sph' => $faker->randomFloat(null, -15, 15),
        'pd' => $faker->numberBetween(40, 100),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
