<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
    protected $table = 'dishes';
    public $timestamps=false;

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function FavByUsers () {
        return $this -> belongsToMany('App\User', 'user_fav_dish', 'dish_id', 'user_id');
    }

    public function foods () {
        return $this -> belongsToMany('App\Food', 'food_dish', 'dish_id', 'food_id');
    }
}
