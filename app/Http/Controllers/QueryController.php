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
        if($request['op1']=='and')
        {
            $dishes1=DB::table('dishes')
                ->where('name','like','%'.$request['dishes1'].'%')
                ->where('name','like','%'.$request['dishes2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        else if($request['op1']=='or')
        {

            $dishes1=DB::table('dishes')
                ->where('name','like','%'.$request['dishes1'].'%')
                ->orWhere('name','like','%'.$request['dishes2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        else
        {
            $dishes1=DB::table('dishes')
                ->where('name','like','%'.$request['dishes1'].'%')
                ->where('name','not like','%'.$request['dishes2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }

        if($request['op2']=='and')
        {
            $dishes2=$dishes1
                ->join('food_dish as f1','dishes.id','=','f1.dish_id')
                ->join('food_dish as f2','dishes.id','=','f2.dish_id')
                ->where(DB::raw('f1.food_name'),'like','%'.$request['foods1'].'%')
                ->where(DB::raw('f2.food_name'),'like','%'.$request['foods2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
                ->distinct();
        }
        else if($request['op2']=='or')
        {
            $dishes2=$dishes1
                ->join('food_dish as f1','dishes.id','=','f1.dish_id')
                ->join('food_dish as f2','dishes.id','=','f2.dish_id')
                ->where(DB::raw('f1.food_name'),'like','%'.$request['foods1'].'%')
                ->orWhere(DB::raw('f2.food_name'),'like','%'.$request['foods2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
                ->distinct();
        }
        else
        {
            $dishes2=$dishes1
                ->join('food_dish as f1','dishes.id','=','f1.dish_id')
                ->where(DB::raw('f1.food_name'),'like','%'.$request['foods1'].'%')
                ->whereNotExists(function($query)
                {
                    global $request;
                    $query->select(DB::raw(1))
                        ->from('food_dish')
                        ->whereRaw('food_dish.dish_id=dishes.id and food_dish.food_name=?',[$request['foods2']]);
                })
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
                ->distinct();
        }

        if($request['op3']=='and')
        {
            $dishes3=$dishes2
                ->join('users','dishes.authorid','=','users.id')
                ->where('users.username','like','%'.$request['author1'].'%')
                ->where('users.username','like','%'.$request['author2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
                ->distinct();
        }
        else if($request['op3']=='or')
        {
            $dishes3=$dishes2
                ->join('users','dishes.authorid','=','users.id')
                ->where('users.username','like','%'.$request['author1'].'%')
                ->orWhere('users.username','like','%'.$request['author2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
                ->distinct();
        }
        else
        {
            $dishes3=$dishes2
                ->join('users','dishes.authorid','=','users.id')
                ->where('users.username','like','%'.$request['author1'].'%')
                ->where('users.username','not like','%'.$request['author2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
                ->distinct();
        }
        if($request['op4']=='and')
        {
            $dishes4=$dishes3
                ->where('tag','like','%'.$request['tag1'].'%')
                ->where('tag','like','%'.$request['tag2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        else if($request['op4']=='or')
        {
            $dishes4=$dishes3
                ->where('tag','like','%'.$request['tag1'].'%')
                ->orWhere('tag','like','%'.$request['tag2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        else
        {
            $dishes4=$dishes3
                ->where('tag','like','%'.$request['tag1'].'%')
                ->where('tag','not like','%'.$request['tag2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        if($request['op5']=='and')
        {
            $dishes5=$dishes4
                ->where('intro','like','%'.$request['content1'].'%')
                ->where('intro','like','%'.$request['content2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        else if($request['op5']=='or')
        {
            $dishes5=$dishes4
                ->where('intro','like','%'.$request['content1'].'%')
                ->orWhere('intro','like','%'.$request['content2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        else
        {
            $dishes5=$dishes4
                ->where('intro','like','%'.$request['content1'].'%')
                ->where('intro','not like','%'.$request['content2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date');
        }
        $dishes=$dishes5->get();
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
