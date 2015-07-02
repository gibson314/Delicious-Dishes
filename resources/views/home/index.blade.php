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
                        <li class="active"><a href="{{ url('../public') }}">主页</a></li>
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

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="carousel slide" id="carousel-743797">
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#carousel-743797">
                        </li>
                        <li data-slide-to="1" data-target="#carousel-743797">
                        </li>
                        <li data-slide-to="2" data-target="#carousel-743797">
                        </li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href="{{ url('dishes') }}"><img alt="" src="../resources/imagines/home/index-img1.jpg" /></a><br/>
                            <div class="carousel-caption">
                                <h4>
                                    寿司
                                </h4>
                                <p>
                                    寿司（sushi），平假名写作すし，既可以作为小吃也可以作正餐，配料种类繁多。
                                    寿司是日本传统美食之一，后传入朝鲜、韩国等地，其主要材料是用寿司醋调味过的维持在人体体温的饭块，再加上鱼肉，海鲜，蔬菜或鸡蛋等作配料，其味道鲜美，很受民众的喜爱。
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <a href="{{ url('dishes') }}"><img alt="" src="../resources/imagines/home/index-img2.jpg" /></a><br/>
                            <div class="carousel-caption">
                                <h4>
                                    冲浪
                                </h4>
                                <p>
                                    冲浪是以海浪为动力，利用自身的高超技巧和平衡能力，搏击海浪的一项运动。运动员站立在冲浪板上，或利用腹板、跪板、充气的橡皮垫、划艇、皮艇等驾驭海浪的一项水上运动。
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <a href="{{ url('foods') }}"><img alt="" src="../resources/imagines/home/index-img3.jpg" /></a><br/>
                            <div class="carousel-caption">
                                <h4>
                                    鳕鱼
                                </h4>
                                <p>
                                    鳕鱼（学名：Gadus），又名鳘鱼，是主要食用鱼类之一。鳕鱼原产于从北欧至加拿大及美国东部的北大西洋寒冷水域。目前鳕鱼主要出产国是加拿大、冰岛、挪威及俄罗斯，日本产地主要在北海道。鳕鱼是全世界年捕捞量最大的鱼类之一，具有重要的经济价值。
                                </p>
                            </div>
                        </div>
                    </div> <a data-slide="prev" href="#carousel-743797" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-743797" class="right carousel-control">›</a>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="footer">
        Powered by PHP Technologies
        <p>Copyright &copy; LMY 2015</p>
        All rights reserved.
    </div>

    </div> <!-- /container -->
@endsection