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
            $table -> integer ('user_id');
            $table -> integer ('dish_id');
            $table -> primary (['user_id', 'dish_id']);
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
