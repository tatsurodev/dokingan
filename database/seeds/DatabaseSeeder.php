<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // usersテーブルは、sexes、rolesテーブルに外部キー設定があるので先にsexes、rolesテーブルのレコードを作る必要があるので、コールする順番に注意
            SexesTableSeeder::class,
            RolesTableSeeder::class,
            // Userシーダーのリレーションで作成するglassesテーブルにbrandsテーブルの外部キーがあるのでbrandsシーダーを先にコール
            BrandsTableSeeder::class,
            UsersGlassesGlassImagesTableSeeder::class,
            // favorites
            FavoritesOwnersTableSeeder::class,
        ]);
    }
}
