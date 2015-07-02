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
            $table->engine = 'InnoDB';
            $table -> string('food_name');
            $table -> integer('dish_id')->unsigned();
            $table -> primary(['dish_id', 'food_name']); //composite key
            $table -> string('volume');

            $table->foreign('food_name')
                ->references ('name')
                ->on ('foods')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('dish_id')
                ->references ('id')
                ->on ('dishes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
