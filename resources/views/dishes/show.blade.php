
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
                        <li class="active"><a href="{{ url('foods') }}">食材</a></li>
                        <li><a href="{{ url('about') }}">关于我们</a></li>
                        <li><a href="home/contact">联系我们</a></li>
                        <li><a href="user">个人中心</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div top="100px",width="500px">
        <p> </br></br></br></br></br></br></p>
    </div>

    {!! link_to_route('dishes.edit', '编辑', $dish->id) !!}

    <div class="container">
        <table class="table">
            <tbody>

            <tr>
                <td colspan="2"><h1>{{$dish->name}}</h1></td>
            </tr>
            <tr>
                <td colspan="2"><a href="{{ url('/author',$dish->authorid) }}">{{$author->username}}</a>上传于{{$dish->publish_date}}</td>
            </tr>
            <tr>
            <td colspan="2" align="center" ><img src={{$dish->TitleImg}} alt='Dish Picture' height="300"/></td>
            </tr>
            <tr>
                <td colspan="2"> {{$dish->intro}}</td>
            </tr>
            <tr>
                <td>食材</td>
                <td>     @foreach($dishfoods as $dishfood)
                        <a href="{{ url('/foods',$dishfood->food_name) }}">{{$dishfood->food_name}}({{$dishfood->volume}})</a><br/>
                    @endforeach</td>
            </tr>
            <tr>
                <td>工具</td>
                <td>     @foreach($utensils as $utensil)
                        {{$utensil->utensil_name}}<br/>
                    @endforeach</td>
            </tr>
            <tr>
                <td>步骤</td>
                <td>
                    <ol>
                        @foreach($steps as $step)
                            <li/>{{$step->description}}<br/>
                            <a href="{{ url($step->step_img) }}"><img src="{{$step->step_img}}"/></a>
                        @endforeach</td>
                    </ol>

            </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('comments')
    <h2>评论</h2>
    <ol>
    @foreach($comments as $comment)
            <?php $cauthor=\App\User::where('id',$comment->author_id)->first();?>
        <li/>{{$cauthor->username}} {{$comment->content}}<br/>
        {{--<a href="{{ url($step->step_img) }}"><img src="{{$step->step_img}}"/></a>--}}
    @endforeach
    </ol>


    <form action="{{ URL('dishes/comments') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="dish_id" value="{{$dish->id}}">
        <textarea name="content" rows="10" class="form-control" required="required"></textarea>
        <br>
        <button class="btn btn-lg btn-info">提交评论</button>
    </form>
@endsection