<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Totalbill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totalbill', function (Blueprint $table) {
            $table->increments('Id_totalbill');
            $table->string('Name_product', 50)->unique();
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('Id_bill')->unsigned();
            $table->foreign('Id_bill')->references('Id_bill')->on('bill')->onDelete('RESTRICT');
          
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
