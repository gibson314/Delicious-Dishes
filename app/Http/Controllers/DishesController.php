<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dish;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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

        return redirect ('/about');            //NEED change
    }

    public function show ($id) {
        $dish = Dish::find($id);

        return view ('dishes.show', compact ('dish'));
    }


}
