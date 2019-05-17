<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glasses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->unsignedInteger('price');
            $table->string('url', 255);
            $table->unsignedInteger('lens_width');
            $table->unsignedInteger('lens_height')->nullable();
            $table->unsignedInteger('bridge_width');
            $table->unsignedInteger('temple_length');
            $table->unsignedInteger('frame_width')->nullable();
            // 投稿者外部キー
            $table->unsignedInteger('user_id');
            // ブランド外部キー
            $table->unsignedInteger('brand_id');
            $table->timestamps();
            // 外部キー設定
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glasses');
    }
}
