<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        factory(\App\User::class, 3)->create();
        // スーパーユーザーを作成
        // \DB::table('users')->first()だと、stdClassが返ってきてupdateメソッドが使えないので注意
        \DB::table('users')->limit(1)->update([
            'username' => 'super',
            'role_id' => 1,
            'email' => 'contacts@tatsuro.dev',
        ]);
    }
}
