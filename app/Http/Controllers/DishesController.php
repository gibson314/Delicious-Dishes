<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dish;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Comment;



class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function create () {
        return view ('dishes.create');
    }


    public function index(){
        //方法二
        $dishes = Dish::orderBy('publish_date','desc')->paginate(10);
        //$dishes = Dish::orderBy('name', 'desc')->get();

        return view('dishes.index')->with('dishes', $dishes);
    }

    public function store (Request $request) {
        //validate the content
        $user = Auth::user();
        $dish = new Dish;
        $dish -> name = $request['name'];
        $dish -> intro = $request['intro'];
        $dish -> tag = $request['tag'];
        $dish -> tip = $request['tip'];
        $dish -> TitleImg = $request ['TitleImg'];
        $dish -> author = $user -> username;
        $dish -> publish_date = Carbon::now();

        $dish -> save ();

        return redirect ('/users/dishes');
    }

    public function update ($id, Request $request) {
        //validate the content

        $dish = Dish::find($id);
        $dish -> name = $request['name'];
        $dish -> intro = $request['intro'];
        $dish -> tag = $request['tag'];
        $dish -> tip = $request['tip'];
        $dish -> TitleImg = $request ['TitleImg'];

//        $dish -> publish_date = Carbon::now();

        $dish -> save ();

        return redirect ('/users/dishes');
    }



    public function show ($id) {
        $dish = Dish::find($id);
        $author=User::where('id',$dish->authorid)->first();
        $dishfoods=DB::table('dishes')
            ->join('food_dish', 'dishes.id', '=', 'food_dish.dish_id')
            ->where('dishes.id', '=', $id)
            ->select('food_dish.food_name', 'food_dish.volume')
            ->get();
        $utensils=DB::table('dishes')
            ->join('dish_utensil', 'dishes.id', '=', 'dish_utensil.dish_id')
            ->where('dishes.id', '=', $id)
            ->select('dish_utensil.utensil_name')
            ->get();
        $steps=DB::table('dishes')
            ->join('dish_step', 'dishes.id', '=', 'dish_step.dish_id')
            ->where('dishes.id', '=', $id)
            ->select('dish_step.step_img','dish_step.description')
            ->get();
        return view ('dishes.show', compact ('dish','dishfoods','utensils','steps','author'));
    }


    public function edit ($id) {
        $dish = Dish::find($id);

        return view ('dishes.edit', compact ('dish'));
    }


    public function addcomment (Request $request){
        $comment = new Comment;

        $user = Auth::user();

        $comment -> content = $request['content'];
        $comment -> dish_id = $request['dish_id'];
        $comment -> author = $user->username;
        $comment -> save();
        return redirect (url('dishes',$comment->dish_id));
    }

}
