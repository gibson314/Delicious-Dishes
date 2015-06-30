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
            $table -> integer ('dish_id');
            $table -> string ('utensil_name');
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
