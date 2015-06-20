<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    public function dishes () {
        return $this -> belongsToMany('App\Dish', 'food_dish', 'food_id', 'dish_id');
    }

}
