<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


//主页
Route :: get ('/', 'HomeController@index');
//about us
Route :: get ('/about', 'HomeController@about');

//用户注册与登录
Route :: controller ('users', 'UsersController');


//页面显示序号为id的菜谱
//Route :: get ('/dishes/{id}', 'DishesController');


