<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 10)->unique();
            // 外部キーsex_idをsexes.idの型と合わせる
            $table->unsignedInteger('sex_id');
            // 外部キーrole_idをroles.idの型と合わせる
            $table->unsignedInteger('role_id')->default(10);
            $table->unsignedInteger('age');
            $table->string('image', 255)->nullable();
            $table->string('comment', 255)->nullable();
            $table->decimal('sph', 4, 2)->nullable();
            $table->unsignedInteger('pd')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
