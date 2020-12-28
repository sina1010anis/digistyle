<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('Orders');
            $table->string('CodeBank');
            $table->integer('Status');
            $table->string('Name');
            $table->string('State');
            $table->string('City');
            $table->string('Mobile');
            $table->string('Email');
            $table->string('TotalPrice');
            $table->string('SendProduct');
            $table->foreign('id_user')->references('users')->on('id')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
