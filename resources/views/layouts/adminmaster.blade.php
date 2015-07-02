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
        #txtLy
        {
            width:100%; /* 为什么textarea的宽度要宽于bk的宽度，如何让它正好占满bk的宽度？？？ */
            height:100px;
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
    <script>
        window.onload = function(){
            var text = document.getElementById('txt'),
                    str = text.innerHTML,
                    textLeng = 150;
            if(str.length > textLeng ){
                text .innerHTML = str.substring(0,150)+"... ...";
            }
        }
    </script>
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
                    <li><a href="{{ url('admin/dishes') }}">菜谱管理</a></li>
                    <li><a href="{{ url('admin/foods') }}">食材管理</a></li>
                    <li><a href="{{ url('admin/users') }}">用户管理</a></li>
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


<div class="container">
    @yield ('content')
</div>
<div class="container">

</div>

<script type="text/javascript" src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>