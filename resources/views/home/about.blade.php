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
                        <li class="active"><a href="{{ url('about') }}">搜索</a></li>
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
