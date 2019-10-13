<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_products', function (Blueprint $table) {
            $table->integer('users_id')->unsigned();
            $table->integer('products_id')->unsigned();
            $table->primary(['users_id','products_id']);
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('users_products');
    }
}
