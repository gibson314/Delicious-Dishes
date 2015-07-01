<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dish;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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

        return view ('dishes.show', compact ('dish'));
    }


    public function edit ($id) {
        $dish = Dish::find($id);

        return view ('dishes.edit', compact ('dish'));
    }



    public function addcomment (Request $request, $id) {
        $comment = new Comment;
        $user = Auth::user();
        $comment -> content = $request['content'];
        $comment -> dish_id = $id;
        $comment -> author = $user->username;
        $comment -> save();
        return redirect ('/users/dishes');
    }

}
