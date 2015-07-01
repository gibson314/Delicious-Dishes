<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishUtensilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_utensil', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
            $table->engine = 'InnoDB';
            $table -> integer ('dish_id')->unsigned();
            $table -> string ('utensil_name');
            $table -> primary(['utensil_name', 'dish_id']);

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
        Schema::drop('dish_utensil');
    }
}
