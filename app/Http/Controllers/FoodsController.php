<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Food;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Cart;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    //中间件，阻止无权限用户访问
    public function __construct()
    {
//        $this->middleware('auth');

//        $this->middleware('login', ['only' => ['create', 'barAction']]);

        $this->middleware('login', ['except' => ['index', 'show']]);
        $this -> middleware ('eliteuser',['except' => ['index', 'show', '']]);
    }






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
        return view ('foods.show', compact ('food','dishes','elements'));
    }

    public function edit ($name) {
        $food = Food::where('name',$name)->first();

        return view ('foods.edit', compact ('food'));
    }

    public function remove ($name) {
        Food::where('name',$name)->delete();

        return redirect ('/admin/foods');
    }
    /*======================================
    **购物车模块
    /======================================*/
    public function addtocart (Request $request) {

        $food = Food::where('name',$request['food_name'])->first();
//        echo($food->name);
        $qty=$request['count'];
        $name = $food->name;
        Cart::add($name, $name, $qty, $food->price);
        return redirect('foods/showcart');
    }

    public function showcart() {
        $carts = Cart::content();
        $total = Cart::total();
        return view ('foods.showcart', compact('carts','total'));
    }

    public function check () {
        $carts = Cart::content();
        $total = Cart::total();
        foreach ($carts as $cart) {
  //          $food = Food::where('name', $cart->name)->first();
  //          $food->inventory -= $cart->qty;
            DB::table('foods')
                ->where('name', $cart->name)
                ->decrement('inventory',$cart->qty);
    //另一种写法            ->update(['inventory' => $food->inventory]);
        }
        //$total=$carts->total;
        Cart::destroy();//清空购物车
        return view ('foods/success',compact ('total'));
    }

    public function clear() {
        Cart::destroy();
        return redirect ('foods/showcart');
    }
}
