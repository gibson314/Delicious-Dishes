<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建菜谱与食材的多对多 枢纽表
        Schema::create('food_dish', function (Blueprint $table) {
            $table -> string('food_name');
            $table -> integer('dish_id');
            $table -> primary(['dish_id', 'food_name']); //composite key
            $table -> string('volume');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('food_dish');
    }
}
