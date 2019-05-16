<?php

use Illuminate\Database\Seeder;

class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sexes')->delete();
        $male = [
            'id' => 1,
            'name' => '男性',
        ];
        $female = [
            'id' => 2,
            'name' => '女性',
        ];
        $unknown = [
            'id' => 9,
            'name' => '適用不可',
        ];
        \DB::table('sexes')->insert([$male, $female, $unknown]);
    }
}
