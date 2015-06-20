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
            $table->timestamps();
            $table->string('name');
            $table->text('steps');
            $table->text ('utensil');
            $table->string ('type');
            $table->string ('photo');


            $table-> integer ('upload_user_id');          //从属的用户
            //$table -> integer ('favourite_user_id');
            //$table -> integer ('comment_user_id');


            $table->foreign('upload_user_id')//生成外键，删除用户时删除所有文章
                ->reference('id')
                ->on('users')
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
        Schema::drop('dishes');
    }
}
