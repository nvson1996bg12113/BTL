<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_customers', function (Blueprint $table) {
            $table->integer('users_id')->unsigned();
            $table->integer('customers_id')->unsigned();
            $table->primary(['users_id','customers_id']);
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('customers_id')->references('id')->on('customers');
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
        Schema::dropIfExists('users_customers');
    }
}
