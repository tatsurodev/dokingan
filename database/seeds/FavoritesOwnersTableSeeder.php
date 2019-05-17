<?php

use App\User;
use App\Glass;

use Illuminate\Database\Seeder;

class FavoritesOwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // favorite, ownerの構造は全く同じなので同時にシード作成
        $this->createSeeder('favorites', 30);
        $this->createSeeder('owners', 10);
    }

    /**
     * @param string $table テーブル名
     * @param int $probability 境界となる確率を0~100で
     */
    private function createSeeder($table, $probability)
    {
        \DB::table($table)->delete();
        // 全user, glassのidを配列に保存
        $user_ids = User::pluck('id')->ToArray();
        $glass_ids = Glass::pluck('id')->ToArray();
        // user_ids, glass_idsの各要素の組み合わせが上記の確率で成功
        foreach ($user_ids as $user_id) {
            foreach ($glass_ids as $glass_id) {
                if ($probability > rand(0, 100)) {
                    User::find($user_id)->$table()->attach($glass_id);
                }
            }
        }
    }
}
