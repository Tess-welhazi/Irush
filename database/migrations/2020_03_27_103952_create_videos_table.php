<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     * ->default('CC BY-NC-ND');
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            // $table->id('video_id');
            $table->id();
            $table->timestamps();
            $table->integer('price');
            $table->string('name');
            $table->string('videoFile');
            $table->string('imageFile');
            $table->text('description')->nullable();
            $table->text('license')->defaul('CC BY');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
