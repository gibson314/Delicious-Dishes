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
            ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
            ->get();
        }
        else if($request['op1']=='or')
        {
            $dishes1=DB::table('dishes')
                ->where('name','like','%'.$request['dishes1'].'%')
                ->orWhere('name','like','%'.$request['dishes2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
                ->get();
        }
        else
        {
            $dishes1=DB::table('dishes')
                ->where('name','like','%'.$request['dishes1'].'%')
                ->where('name','notlike','%'.$request['dishes2'].'%')
                ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
                ->get();
        }
//        $dishes=DB::table('dishes')
//            ->join('users','dishes.authorid','=','users.id')
//            ->where('name','like','%'.$request['dishes1'].'%')
//            ->orWhere('name','like','%'.$request['dishes2'].'%')
//            ->orderBy('publish_date','desc')
//            ->select('dishes.id','dishes.name','dishes.TitleImg','dishes.intro','dishes.authorid','dishes.publish_date')
//            ->get();
        $dishes=$dishes1;
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
