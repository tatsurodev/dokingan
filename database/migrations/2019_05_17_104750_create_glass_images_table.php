<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlassImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glass_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('glass_id');
            $table->string('image', 255);
            $table->timestamps();
            $table->foreign('glass_id')->references('id')->on('glasses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glass_images');
    }
}
