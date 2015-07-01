<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Food extends Model
{
    protected $table = 'foods';
    public $timestamps=false;
    //

    public function dishes () {
        return $this -> belongsToMany('App\Dish', 'food_dish', 'food_name', 'dish_id');
    }

}
