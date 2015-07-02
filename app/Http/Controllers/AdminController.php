<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Food;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
   public function index () {
       return view ('admin.index');
   }

    public function users () {
        $users = User::paginate(10);
        $users->setPath('users');
        return view ('admin.users', compact('users'));
    }

    public function dishes () {
        $dishes = Dish::paginate(10);
        $dishes->setPath('dishes');
        return view ('admin.dishes', compact('dishes'));
    }

    public function foods () {
        $foods = Food::paginate(10);
        $foods->setPath('foods');
        return view ('admin.foods', compact ('foods'));
    }
}
