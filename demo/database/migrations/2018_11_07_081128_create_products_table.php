<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->float('price')->default(0);
            $table->float('import_price')->default(0);
            $table->longText('description')->nullable();
            $table->integer('categorys_id')->unsigned();
            $table->foreign('categorys_id')->references('id')->on('categorys');
            $table->integer('vendors_id')->unsigned();
            $table->foreign('vendors_id')->references('id')->on('vendors');
            $table->integer('sale')->default(0);
            $table->integer('viewer')->default(0);
            $table->integer('inventory')->default(0);
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
        Schema::dropIfExists('products');
    }
}
