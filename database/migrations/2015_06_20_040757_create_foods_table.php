<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
//            $table->increments('id');
            //$table->timestamps();
            $table -> string ('name');
            $table -> text ('intro');
            $table -> text('detail');
            $table -> string ('img');
            $table -> primary('name');  //主键
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('foods');
    }
}
