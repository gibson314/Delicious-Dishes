<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_fav_food', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table -> integer ('user_id')->unsigned();
            $table -> string ('food_name');
            $table -> primary (['user_id', 'food_name']);

            $table->foreign('user_id')//生成foreign key
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('food_name')
                ->references ('name')
                ->on ('foods')
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
        Schema::drop('user_fav_food');
    }
}
