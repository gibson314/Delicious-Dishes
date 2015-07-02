<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Food;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $foods = Food::orderBy('name','asc')->paginate(10);
        $foods->setPath('foods');
        //$dishes = Dish::orderBy('name', 'desc')->get();

        return view('foods.index')->with('foods', $foods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view ('foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        //validate the content
        $user = Auth::user();
        $food = new Food;
        $food -> name = $request['name'];
        $food -> intro = $request['intro'];
        $food -> detail = $request['detail'];
        $food -> img = $request['img'];

        $food -> save();

        return redirect('/dishes/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($name) {
        $food = Food::where('name',$name)->first();
        $dishes=DB::table('foods')
            ->join('food_dish', 'foods.name', '=', 'food_dish.food_name')
            ->join('dishes', 'food_dish.dish_id', '=', 'dishes.id')
            ->where('foods.name', '=', $name)
            ->get();
        $elements=DB::table('foods')
            ->join('food_element', 'foods.name', '=', 'food_element.food')
            ->where('foods.name', '=', $name)
            ->select('food_element.element','food_element.volume')
            ->get();

 //      $this->load->view('include/header', $user_info);
        return view ('foods.show', compact ('food','dishes','elements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
