<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');


            $table -> integer ('dish_id');
            $table -> integer ('author_id');
            $table -> text ('content');
            $table->timestamps();



//            $table->foreign('author')//生成foreign key
//            ->references('username')
//                ->on('users');

//            $table->foreign('dish_id')
//                ->references ('id')
//                ->on ('dishes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
