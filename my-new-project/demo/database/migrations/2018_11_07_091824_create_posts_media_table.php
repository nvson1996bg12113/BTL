<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_media', function (Blueprint $table) {
            $table->integer('posts_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->primary(['posts_id','media_id']);
            $table->foreign('posts_id')->references('id')->on('posts');
            $table->foreign('media_id')->references('id')->on('media');
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
        Schema::dropIfExists('posts_media');
    }
}
