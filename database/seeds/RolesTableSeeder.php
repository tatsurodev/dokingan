<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        $super = [
            'id' => 1,
            'role_name' => 'super',
        ];
        $admin = [
            'id' => 5,
            'role_name' => 'admin',
        ];
        $user = [
            'id' => 10,
            'role_name' => 'user',
        ];
        \DB::table('roles')->insert([$super, $admin, $user]);
    }
}
