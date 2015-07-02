<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{


    //中间件，阻止无权限用户访问
    public function __construct()
    {
//        $this->middleware('auth');

//        $this->middleware('login', ['only' => ['create', 'barAction']]);
        $this->middleware('login', ['except' => ['getRegister', 'getLogin', 'postCreate', 'postSignin']]);
    }






    //注册
    public function getRegister () {
        $message="欢迎注册！";
        return view ('users.register', compact('message'));
    }

    //注册表单提交
    public function postCreate (Request $request) {
        //表单验证
        /*
         *  required:必填的，不能为空
            alpha:字母
            email:邮件格式
            unique:users:唯一，参考users表的设置
            alpha_num:字母或数字
            between:长度位于哪两个数字之间
            confirmed:需要确认的
         * */
        $this -> validate ($request, [
            'username' => 'required|alpha_num|between:3,20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:6,20|confirmed',
            'password_confirmation' => 'required|between:6,20'
        ]);
        $user = new User;
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->privilege = 1;
        $user->save();
        //$message = "注册成功，请重新登录";
        //登录获取session
        Auth :: attempt ([
            'username'=>$request['username'],
            'password'=>$request['password']
        ]);

        return redirect ('users/profile');

    }


    public function getLogin () {
        $message = "";
        return view ('users.login', compact('message'));
    }

    public function postSignin (Request $request) {
        if (Auth :: attempt ([
            'username'=>$request['name_mail'],
            'password'=>$request['password']
        ]) ||
            Auth :: attempt ([
                'email'=>$request['name_mail'],
                'password'=>$request['password']
            ])
        ) {
            //重定向到个人中心，未实现
            return redirect ('users/success');
        }
        else {
            $message = "用户名或密码错误";
            return view ('users.login', compact('message'));
        }

    }

    //登陆成功
    public function getSuccess () {
        return view ('users.success');
    }


    //填写更多个人信息
    public function getMoreinfo () {
        $user = Auth::user();
        return view ('users.moreinfo', compact('user'));
    }

    public function postUpdate (Request $request) {
        $this -> validate ($request, [
            'sex' => 'required',
            'age' => 'required',
            'birthday' => 'required|date',
            'place' => 'required'
        ]);


        $user = Auth::user();
        $user -> sex = $request['sex'];
        $user -> age = $request['age'];
        $user -> birthday = $request['birthday'];
        $user -> place = $request ['place'];
        $user -> privilege = 2;//Elite User, could update the dishes
        $user -> save();
        return redirect ('/users/profile');
    }

    public function postDel (Request $request) {
        DB::table('users')->where('id', '=', $request['delid'])->delete();

        return redirect ('admin/users');
    }



    public function getLogout () {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect ('users/login');
    }

    public function getProfile () {
        if (Auth::check()) {
            $user = Auth::user();
            return view ('users.profile', compact ('user'));
        }
    }


    public function getDishes () {
        $user = Auth::user();
        $dishes = User::find($user->id) -> dishes;
        return view ('users.getdishes', compact('dishes'));
    }

    public function postChangepri(Request $request) {
        $user =User::find($request['priid']);
        $user->privilege = $request['privilege'];
        $user->save();
        return redirect('admin/users');
    }



//===========================dish fav===========================
    public function postFav (Request $request) {
        $user = Auth::user();
        $dishid = $request['dish_id'];
        DB::table('user_fav_dish')->insert(
            ['user_id' => $user->id, 'dish_id' => $dishid]
        );
        //user->id, dishid  add to table: user_fav_dish
        return redirect('dishes/'.$dishid);
    }

    public function postUnfav (Request $request) {
        $user = Auth::user();
        $dishid = $request['dish_id'];
        DB::table('user_fav_dish')->where('user_id', '=', $user->id)
            ->where('dish_id', '=', $dishid)
            ->delete();
        //user->id, dishid  add to table: user_fav_dish
        return redirect('dishes/'.$dishid);
    }


    //===========================food fav==========================
    public function postFav2 (Request $request) {
        $user = Auth::user();
        $foodname = $request['food_name'];
        DB::table('user_fav_food')->insert(
            ['user_id' => $user->id, 'food_name' => $foodname]
        );
        //user->id, dishid  add to table: user_fav_dish
        return redirect('foods/'.$foodname);
    }

    public function postUnfav2 (Request $request) {
        $user = Auth::user();
        $foodname = $request['food_name'];
        DB::table('user_fav_food')->where('user_id', '=', $user->id)
            ->where('food_name', '=', $foodname)
            ->delete();
        //user->id, dishid  add to table: user_fav_dish
        return redirect('foods/'.$foodname);
    }
    //===========================food fav==========================




    //============================我收藏的XX=========================
    public function getFavdishes () {
        $dishes = DB::table ('user_fav_dish') -> where ('user_id','=',Auth::user()->id);
        return view ('users.favdishes', compact('dishes'));
    }

    public function getFavfoods () {
        $foods = DB::table ('user_fav_food') -> where ('user_id','=',Auth::user()->id);
        return view ('users.favfoods', compact('foods'));
    }
}









