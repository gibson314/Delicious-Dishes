<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Food;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */






    public function query()
{
    return view ('query.query');
}

    public function dishes(Request $request)
    {
        $dishes=Dish::where('name','like','%'.$request['name'].'%')->orderBy('publish_date','desc')->get();
        return view('query.dresult')->with('dishes', $dishes);
    }

    public function foods(Request $request)
    {
        $foods=Food::where('name','like','%'.$request['name'].'%')->orderBy('name','asc')->get();
        return view('query.fresult')->with('foods', $foods);
    }

    public function author(Request $request)
    {
        $authors=User::where('username','like','%'.$request['name'].'%')->orderBy('id','asc')->get();
        return view('query.aresult')->with('authors', $authors);
    }
    public function dresult(Request $request)
    {
        $dishes=Dish::where('name','like','%'.$request['name'].'%')->orderBy('publish_date','desc')->paginate(10);
        $dishes->setPath('query/dishes');
        return view('query.dresult')->with('dishes', $dishes);
    }

    public function hquery()
    {
        return view ('query.hquery');
    }

    public function result(Request $request)
    {
        $dishes1=DB::table('dishes')
            ->where('name','like','%'.$request['dishes1'].'%');
        if($request['op1']=='and')
        {
            $dishes1=$dishes1->Where('name','like','%'.$request['dishes2'].'%')
            ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        else if($request['op1']=='or')
        {
            $dishes1=$dishes1->orWhere('name','like','%'.$request['dishes2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        else
        {
            $dishes1=$dishes1->where('name','not like','%'.$request['dishes2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }

        if($request['op2']=='and')
        {
            $dishes1=$dishes1->Where('name','like','%'.$request['dishes2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        else if($request['op2']=='or')
        {
            $dishes4 =DB::select('select distinct dishes.id,dishes.name,dishes.TitleImg,dishes.intro,dishes.authorid,dishes.publish_date
                                  from food_dish,dishes
                                  where food_dish.food_name = :id
                                  and food_dish.dish_id=dishes.id', ['id' =>$request['foods1']]);
            $dishes3 =DB::select('select distinct dishes.id,dishes.name,dishes.TitleImg,dishes.intro,dishes.authorid,dishes.publish_date from food_dish,dishes where food_dish.food_name = :id and food_dish.dish_id=dishes.id', ['id' =>$request['foods2']]);
            $dishes2=DB::statement('select distinct dishes.id,dishes.name,dishes.TitleImg,dishes.intro,dishes.authorid,dishes.publish_date
                                  from food_dish,dishes
                                  where food_dish.food_name = :id
                                  and food_dish.dish_id=dishes.id1
                                  union
                                  select distinct dishes.id,dishes.name,dishes.TitleImg,dishes.intro,dishes.authorid,dishes.publish_date
                                  from food_dish,dishes
                                  where food_dish.food_name = :id
                                  and food_dish.dish_id=dishes.id2
                                  ', ['id1' =>$request['foods1'],'id2' =>$request['foods2']]);
//            $dishes2=DB::table('dishes','food_dish')
//                ->where('food_name','=',$request['foods1']);
//            ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
//            $dishes2=$dishes1
//                ->join('$dishes3','dishes.id','=','food_dish.dish_id')
//                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        else
        {
            $dishes1=$dishes1->where('name','not like','%'.$request['dishes2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
//
//        if($request['op2']=='and')
//        {
//            $dishes2=DB::select('select * from dishes where name=?',[$request['dishes1']]);
//            echo($dishes2[1]);
////            $dishes2=DB::table('dishes')
////                ->join('food_dish','as','1','dishes.id','=','food_dish.dish_id')
////                ->join('food_dish','as','2','dishes.id','=','food_dish.dish_id')
////                ->where('food_dish.food_name','=',$request['foods1'])
////                ->where('food_dish.food_name','=',$request['foods1'])
////                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
////                ->get();
//        }
//        else if($request['op2']=='or')
//        {
//            $dishes2=DB::table('dishes')
//                ->where('name','like','%'.$request['foods1'].'%')
//                ->orWhere('name','like','%'.$request['foods2'].'%')
//                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
//                ->intersect($dishes1)->get();
//        }
//        else
//        {
//            $dishes2=DB::table('dishes')
//                ->where('name','like','%'.$request['foods1'].'%')
//                ->where('name','not like','%'.$request['foods2'].'%')
//                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
//                ->intersect($dishes1)->get();
//        }
//        $dishes=DB::table('dishes')
//            ->join('users','dishes.authorid','=','users.id')
//            ->where('name','like','%'.$request['dishes1'].'%')
//            ->orWhere('name','like','%'.$request['dishes2'].'%')
//            ->orderBy('publish_date','desc')
//            ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
//            ->get();
        $dishes=$dishes2;
        return view('query.dresult')->with('dishes', $dishes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
