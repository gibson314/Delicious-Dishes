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
            $table -> text ('intro') -> nullable();
            $table -> text('detail')-> nullable();
            $table -> string ('img')-> nullable();
            $table -> integer ('inventory')->default("100");
            $table -> double ('price')->default("8.99");
            $table -> string('unit')->default("单位");
            $table -> primary('name');  //主键

        });

//        DB::unprepared('
//        CREATE PROCEDURE food_Create_Default_Task_1(IN food_name VARCHAR(255))
//        BEGIN
//            INSERT INTO foods VALUES (food_name,\'Default\',\'Default\',\'Default\');
//        END'
//        );
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
