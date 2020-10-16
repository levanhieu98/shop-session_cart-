<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('Id_product');
            $table->string('Ten_cproduct', 50)->unique();
            $table->integer('price');
            $table->integer('quantity');
            $table->string('image');
            $table->boolean('Trangthai');
            $table->integer('Id_category')->unsigned();
            $table->integer('id')->unsigned();
            $table->foreign('Id_category')->references('Id_category')->on('category')->onDelete('RESTRICT');
            $table->foreign('id')->references('id')->on('users')->onDelete('RESTRICT');
          
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
