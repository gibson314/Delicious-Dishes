@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <h3 style="color:grey">Delicious Dishes</h3>
                </div>
                <div class="container">
                    <ul class="nav">
                        @yield('header')
                        <li><a href="{{ url('../public') }}">主页</a></li>
                        <li><a href="{{ url('dishes') }}">菜谱</a></li>
                        <li><a href="{{ url('foods') }}">食材</a></li>
                        <li><a href="{{ url('query') }}">搜索</a></li>
                        <li><a href="{{ url('about') }}">关于我们</a></li>
                        @if (!Auth::check())
                            <li class="dropdown">
                                <a href="{{ url('/users/profile') }}" class="dropdown-toggle" data-toggle="dropdown">个人中心 <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/users/login') }}">登陆</a></li>
                                    <li><a href="{{ url('/users/register') }}">注册</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="{{ url('/users/profile') }}" class="dropdown-toggle" data-toggle="dropdown">个人中心 <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/users/profile') }}">个人主页</a></li>
                                    <li><a href="{{ url('/users/logout') }}">退出</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div top="100px",width="500px">
        <p> </br></br></br></br></br></br></p>
    </div>
    <h1>{{$author->username}}</h1>

                    @foreach($dishes as $dish)
                        <h2><a href="{{ url('/dishes',$dish->id) }}"><img src="{{$dish->TitleImg}}"/></a></h2>
                        <h2><a href="{{ url('/dishes',$dish->id) }}">{{$dish->name}}</a><br></h2>
                        {{$dish->intro}}
                    @endforeach


@endsection