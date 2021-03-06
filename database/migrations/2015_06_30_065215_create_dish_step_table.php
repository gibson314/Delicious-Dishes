<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_step', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
            $table->engine = 'InnoDB';
            $table -> integer ('dish_id')->unsigned();
            $table -> integer ('step_id');
            $table -> text ('description');
            $table -> string ('step_img') -> nullable();


            $table -> primary(['dish_id', 'step_id']);

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
        Schema::drop('dish_step');
    }
}
