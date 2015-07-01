<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table -> string('name');
            $table->date('publish_date');
            $table->text ('intro');

            $table->string('tip');
            $table->string('tag');
            $table->string('TitleImg');


            $table-> string ('author');          //从属的用户
            //$table -> integer ('favourite_user_id');
            //$table -> integer ('comment_user_id');


            $table->foreign('author')//生成外键，删除用户时删除所有dish
                ->references('username')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dishes');
    }
}
