<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户收藏菜谱 枢纽表
        Schema::create('user_fav_dish', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table -> integer ('user_id')->unsigned();
            $table -> integer ('dish_id')->unsigned();
            $table -> primary (['user_id', 'dish_id']);

            $table->foreign('user_id')//生成foreign key
                ->references('id')
                ->on('users')
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
        Schema::drop('user_fav_dish');
    }
}
