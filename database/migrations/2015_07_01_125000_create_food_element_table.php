<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodElementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_element', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table -> string ('food');
            $table -> string ('element');
            $table -> string ('volume');
            $table -> primary(['food', 'element']);

            $table->foreign('food')
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
        Schema::drop('food_element');
    }
}
