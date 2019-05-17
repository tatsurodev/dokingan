<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesAndOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $this->upProcedure($table);
        });
        Schema::create('owners', function (Blueprint $table) {
            $this->upProcedure($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('owners');
    }

    private function upProcedure($table)
    {
        $table->unsignedInteger('user_id');
        $table->unsignedInteger('glass_id');
        $table->timestamps();
        // 外部キー設定
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('glass_id')->references('id')->on('glasses')->onDelete('cascade');
        // 組み合わせでユニーク設定
        $table->unique(['user_id', 'glass_id']);
    }
}
