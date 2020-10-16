<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('Id_bill');
            $table->string('Name', 50)->unique();
            $table->date('Date')->unique();
            $table->string('Addrees', 50);
            $table->integer('Totalprice');
            $table->boolean('Trangthai');
            $table->integer('id')->unsigned();
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
        Schema::dropIfExists('bill');
    }
}
