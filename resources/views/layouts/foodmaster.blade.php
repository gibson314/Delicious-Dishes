<!DOCTYPE html>
<html lang="ch">
<head>
    <meta charset="utf-8">
    <title>Template &middot; Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://v2.bootcss.com//assets//css//bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 20px;
            padding-bottom: 60px;
        }

        /* Custom container */
        .container {
            margin: 0 auto;
            max-width: 1000px;
        }
        .container > hr {
            margin: 60px 0;
        }

        /* Main marketing message and sign up button */
        .jumbotron {
            margin: 80px 0;
            text-align: center;
        }
        .jumbotron h1 {
            font-size: 100px;
            line-height: 1;
        }
        .jumbotron .lead {
            font-size: 24px;
            line-height: 1.25;
        }
        .jumbotron .btn {
            font-size: 21px;
            padding: 14px 24px;
        }

        /* Supporting marketing content */
        .marketing {
            margin: 60px 0;
        }
        .marketing p + h4 {
            margin-top: 28px;
        }


        /* Customize the navbar links to be fill the entire space of the .navbar */
        .navbar .navbar-inner {
            padding: 0;
        }
        .navbar .nav {
            margin: 0;
            display: table;
            width: 100%;
        }
        .navbar .nav li {
            display: table-cell;
            width: 1%;
            float: none;
        }
        .navbar .nav li a {
            font-weight: bold;
            text-align: center;
            border-left: 1px solid rgba(255,255,255,.75);
            border-right: 1px solid rgba(0,0,0,.1);
        }
        .navbar .nav li:first-child a {
            border-left: 0;
            border-radius: 3px 0 0 3px;
        }
        .navbar .nav li:last-child a {
            border-right: 0;
            border-radius: 0 3px 3px 0;
        }
    </style>
    <link href="http://v2.bootcss.com//assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://v2.bootcss.com//assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://v2.bootcss.com//assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://v2.bootcss.com//assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://v2.bootcss.com//assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://v2.bootcss.com//assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="http://v2.bootcss.com//assets/ico/favicon.png">

</head>


<body>
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
                    <li class="active"><a href="{{ url('foods') }}">食材</a></li>
                    <li><a href="{{ url('about') }}">搜索</a></li>
                    <li><a href="home/contact">关于我们</a></li>
                    <li><a href="user">个人中心</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div top="100px",width="500px">
    <p> </br></br></br></br></br></br></p>
</div>
{{--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">--}}
{{--<div class="navbar navbar navbar-fixed-top">--}}
{{--<div class="navbar-inner">--}}
{{--<div class="container">--}}
{{--<h3 style="color:grey">Delicious Dishes</h3>--}}
{{--</div>--}}
{{--<div class="container">--}}
{{--<ul class="nav">--}}
{{--@yield('header')--}}
{{--<li class="active"><a href="#">Home</a></li>--}}
{{--<li><a href="#">Dishes</a></li>--}}
{{--<li><a href="#">Foods</a></li>--}}
{{--<li><a href="#">About</a></li>--}}
{{--<li><a href="#">Contact</a></li>--}}
{{--<li><a href="#">Self-space</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}
{{--<div top="100px",width="500px">--}}
{{--<p> </br></br></br></br></br></br></br></p>--}}
{{--</div>--}}
{{--<html lang="ch">--}}
{{--<head>--}}
{{--<meta charset="UTF-8">--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--<title>Delicious Dishes</title>--}}
{{--<!--<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">-->--}}
{{--<!--<link href="assets/bower/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->--}}
{{--<link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">--}}
{{--<style>--}}
{{--body{--}}
{{--padding-top: 50px;--}}
{{--background-color: #CCC;--}}
{{--}--}}
{{--</style>--}}
{{--</head>--}}


{{--<body>--}}
{{--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">--}}
{{--<div class="container">--}}
{{--<div class="navbar-header">--}}
{{--<a href="{{url('/')}}" class="navbar-brand">--}}
{{--Delicious Dishes--}}
{{--</a>--}}
{{--</div>--}}
{{--<div id="navbar" class="collapse navbar-collapse">--}}
{{--<ul class="nav navbar-nav">--}}
{{--<li><a href="{{url('/')}}">Home</a></li>--}}
{{--<li><a href="{{url('/about')}}">About</a></li>--}}
{{--<li><a href="{{url('/')}}">Contact</a></li>--}}
{{--</ul>--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--@if (!Auth::check())--}}
{{--<li><a href="{{ url('/users/login') }}">登录</a></li>--}}
{{--<li><a href="{{ url('/users/register') }}">注册</a></li>--}}
{{--@else--}}
{{--<li><a href="{{ url('/users/profile') }}">个人中心</a></li>--}}
{{--<li><a href="{{ url('/users/logout') }}">退出</a></li>--}}
{{--@endif--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}

{{--<script src="../resources/Bootstrap, from Twitter_files/jquery.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-transition.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-alert.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-modal.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-dropdown.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-scrollspy.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-tab.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-tooltip.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-popover.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-button.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-collapse.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-carousel.js"></script>--}}
{{--<script src="../resources/Bootstrap, from Twitter_files/bootstrap-typeahead.js"></script>--}}



<div class="container">
    @yield ('content')
</div>
<div class="container">
    @yield ('comments')
</div>
@yield ('footer')
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>