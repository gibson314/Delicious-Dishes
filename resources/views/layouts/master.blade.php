<!DOCTYPE html>
<html lang="ch">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delicious Dishes</title>
    <!--<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">-->
    <!--<link href="assets/bower/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body{
            padding-top: 50px;
            background-color: #CCC;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a href="{{url('/')}}" class="navbar-brand">
                Delicious Dishes
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/about')}}">About</a></li>
                <li><a href="{{url('/')}}">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            @if (!Auth::check())
                <li><a href="{{ url('/users/login') }}">登录</a></li>
                <li><a href="{{ url('/users/register') }}">注册</a></li>
            @else
                    <li><a href="{{ url('/users/profile') }}">个人中心</a></li>
                <li><a href="{{ url('/users/logout') }}">退出</a></li>
            @endif
            </ul>
        </div>
    </div>
</nav>






<div class="container">
    @yield ('content')
</div>
@yield ('footer')
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>