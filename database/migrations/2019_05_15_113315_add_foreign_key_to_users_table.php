<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // 外部キーの参照先テーブルを作成する前に外部キー設定をしようとしてもエラーになるので注意
            // この場合、usersテーブルのマイグレーションファイルは一番古く作成されていることになっているので、そのファイルに外部キー設定をしてしまうと参照されるテーブルが作成される前なのでエラーとなる
            // 性別の外部キー設定
            $table->foreign('sex_id')->references('id')->on('sexes')->onDelete('cascade');
            // ロールの外部キー設定
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['sex_id', 'role_id']);
        });
    }
}
