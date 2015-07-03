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


//中间件，阻止无权限用户访问
    public function __construct()
    {
//        $this->middleware('auth');

//        $this->middleware('login', ['only' => ['create', 'barAction']]);

        $this->middleware('login', ['except' => ['index', 'show']]);
        $this->middleware('eliteuser', ['except' => [
            'index', 'show', 'create', 'store'
        ]]);
    }

    public function create () {
        return view ('dishes.create');
    }


    public function index(){
        //方法二
        $dishes = Dish::orderBy('publish_date','desc')->paginate(10);
        $dishes->setPath('dishes');
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
        $dish -> authorid = $user -> id;
        $dish -> publish_date = Carbon::now();
        $dish -> save ();

        $count = $request['step_count'];
        //step_count: 步骤数     content1: 第一个步骤    photo1: 第一个图片
        for ( $tmp=1; $tmp <= $count; $tmp++ ) {
            $content = $request['content'.$tmp];
            $photo = $request['photo'.$tmp];
            DB::table('dish_step')->insert(['dish_id' => $dish->id, 'step_id' => $tmp, 'description' => $content, 'step_img' => $photo]);
        }
        $count2 = $request['food_count'];
        for ( $tmp=1; $tmp <= $count2; $tmp++ ) {
            $food = $request['food'.$tmp];
            $volume = $request['volume'.$tmp];
            DB::table('food_dish')->insert(['dish_id' => $dish->id, 'food_name' => $food, 'volume' => $volume]);
        }
        $count3 = $request['utensil_count'];
        for ( $tmp=1; $tmp <= $count3; $tmp++ ) {
            $utensil = $request['utensil'.$tmp];
            DB::table('dish_utensil')->insert(['dish_id' => $dish->id, 'utensil_name' => $utensil]);
        }
        //$dish -> save ();

//        return view ('home.about', compact ('dish'));
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
            ->select('dish_step.step_img','dish_step.description','dish_step.step_id')
            ->get();
        $comments=DB::table('dishes')
            ->join('comments', 'dishes.id', '=', 'comments.dish_id')
            ->where('dishes.id', '=', $id)
            ->orderBy('comments.id','desc')
            ->get();



        return view ('dishes.show', compact ('dish','dishfoods','utensils','steps','author','comments'));
    }


    public function edit ($id) {
        $dish = Dish::find($id);

        return view ('dishes.edit', compact ('dish'));
    }

    public function del (Request $request) {

        Dish::where('id',$request['delid'])->delete();

        return redirect ('/admin/dishes');
    }

    public function dele (Request $request) {

        Dish::where('id',$request['delid'])->delete();

        return redirect ('users/dishes');
    }

    public function addcomment (Request $request){
        $comment = new Comment;

        $user = Auth::user();

        $comment -> content = $request['content'];
        $comment -> dish_id = $request['dish_id'];
        $comment -> author_id = $user->id;
        $comment -> rate = $request['rate'];
        $comment -> save();
        return redirect ('dishes/'.$comment->dish_id.'#comments');
    }

}
