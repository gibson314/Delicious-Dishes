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


//菜谱群组
//Route::group(['prefix' => 'dishes'
////    , 'middleware' => 'authority'
//], function() {
//    Route :: get ('create', 'DishesController@create');
//    Route :: get ('/', 'DishesController@index');
//    Route :: get ('{id}', 'DishesController@show');
//    Route :: post ('store', 'DishesController@store');
//    Route :: post ('update', 'DishesController@update');
//    Route :: get ('edit/{id}', 'DishesController@edit');
//});


//
//==========================用户主页=====================
Route :: resource ('author', 'AuthorController');


//==========================查询========================
Route :: get ('query', 'QueryController@query');
Route :: get ('hquery', 'QueryController@hquery');
Route :: post ('query/result', 'QueryController@result');
Route :: post ('query/dishes', 'QueryController@dishes');
Route :: post ('query/foods', 'QueryController@foods');
Route :: post ('query/author', 'QueryController@author');

//=============================Dishes=========================
Route::post ('dishes/comments', 'DishesController@addcomment');
Route :: get ('dishes/',  'DishesController@index');
Route :: resource ('dishes', 'DishesController');


//=============================Foods=========================
Route :: post ('foods/addtocart', 'FoodsController@addtocart');
Route :: get ('foods/showcart', 'FoodsController@showcart');
Route :: get ('foods/check', 'FoodsController@check');
Route :: get ('foods/clear', 'FoodsController@clear');
Route :: resource ('foods', 'FoodsController');

//Route :: get ('dishes/hello', 'DishesController@hello');


//Route :: get ('/dishes/create', 'DishesController@create');
//Route :: get ('/dishes', 'DishesController@index');
//Route :: get ('/dishes/{id}', 'DishesController@show');
//Route :: post ('/dishes/store', 'DishesController@store');
//Route::get ('/dishes/edit/{id}', );

