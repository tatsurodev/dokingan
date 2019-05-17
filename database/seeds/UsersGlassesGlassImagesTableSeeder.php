<?php

use Illuminate\Database\Seeder;

// 画像削除
use Illuminate\Support\Facades\Storage;

class UsersGlassesGlassImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user->glasses()->glass_images()で一気にユーザー、メガネ、メガネ画像を作成
        // 関連レコード削除
        \DB::table('users')->delete();
        \DB::table('glasses')->delete();
        \DB::table('glass_images')->delete();
        // 関連ファイル削除
        Storage::deleteDirectory('users/profiles');
        Storage::deleteDirectory('glassess/images');
        // Userをファクトリーで作成
        factory(\App\User::class, rand(3, 5))->create()->each(function ($user) {
            // 各UserとのリレーションでGlassをファクトリーで作成
            $user->glasses()->saveMany(
                // create()ではなくメモリ上にmake()
                factory(App\Glass::class, rand(0, 10))->make()
                // 各GlassとのリレーションでGlassImageをファクトリーで作成
            )->each(function ($glass) {
                $glass->glassImages()->saveMany(
                    factory(App\GlassImage::class, rand(1, 10))->make()
                );
            });
        });
        // スーパーユーザーを作成
        // \DB::table('users')->first()だと、stdClassが返ってきてupdateメソッドが使えないので注意
        \DB::table('users')->limit(1)->update([
            'username' => 'super',
            'role_id' => 1,
            'email' => 'contacts@tatsuro.dev',
        ]);
    }
}
