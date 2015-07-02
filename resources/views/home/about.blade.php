@extends('layouts.master')
@section('content')
    {{--<div class="hero-unit">--}}
    {{--<h1>Hello, world!</h1>--}}
    {{--<p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>--}}
    {{--<p><a href="http://v2.bootcss.com/examples/hero.html#" class="btn btn-primary btn-large">Learn more »</a></p>--}}
    {{--</div>--}}
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
                        <li class="active"><a href="{{ url('about') }}">关于我们</a></li>
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
    <h1>About Us</h1>
    <hr>
    部分数据来源：http://www.meishichina.com/<br><br>
    开发者： 刘宇昂、马力天、杨蕊<br><br>
    联系方式：<br><br>
    如有任何问题或者建议请积极联系我们。<br><br>


@endsection
