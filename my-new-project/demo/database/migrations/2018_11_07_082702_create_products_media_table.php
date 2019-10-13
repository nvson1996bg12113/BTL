<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_media', function (Blueprint $table) {
            $table->integer('products_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->primary(['products_id', 'media_id']);
            $table->foreign('media_id')->references('id')->on('media');
            $table->foreign('products_id')->references('id')->on('products');
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
        Schema::dropIfExists('products_media');
    }
}
