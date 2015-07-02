
@extends('layouts.master')
@section('content')
    <div class="container">

<h2>菜谱详情</h2>

    </div>
<div class="container">
    <h4>主题图片</h4>
    <img src={{$dish->TitleImg}} alt='Dish Picture' height=300px width=400px/>
</div>
<div class="container">
    <h4>菜谱信息</h4>

    {!! link_to_route('dishes.edit', '编辑', $dish->id) !!}

</div>

    {{--<table width="200" border="1">--}}
        {{--<tr>--}}
            {{--<td colspan="3">&nbsp;</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td colspan="3">&nbsp;</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td rowspan="2">&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>&nbsp;</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td colspan="2">&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td colspan="3">&nbsp;</td>--}}
        {{--</tr>--}}
    {{--</table>--}}

    <div class="container">
        <table class="table">
            <tbody>

            <tr>
                <td>名称</td>
                <td> {{$dish->name}}</td>
            </tr>
            <tr>
                <td>作者</td>
                <td><a href="{{ url('/author',$dish->authorid) }}">{{$author->username}}</a></td>
            </tr>
            <tr>
                <td>简介</td>
                <td> {{$dish->intro}}</td>
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




{{--提交评论--}}
@section('comments')
    <h2>评论</h2>
    <ol>
    @foreach($comments as $comment)
            <?php $cauthor=\App\User::where('id',$comment->author_id)->first();?>
        <li/>{{$cauthor->username}} {{$comment->content}}<br/>
        {{--<a href="{{ url($step->step_img) }}"><img src="{{$step->step_img}}"/></a>--}}
    @endforeach
    </ol>

@if (Auth::guest())
    <p>请先<a href="{{url('users/login')}}">登录</a>，来发表你的评论，或为你喜爱的食物评分</p>
    <form action="{{ URL('dishes/comments') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" disabled>
        <input type="hidden" name="dish_id" value="{{$dish->id}}" disabled>
        <textarea name="content" rows="10" class="form-control" required="required" disabled></textarea>
        <br>
        <button class="btn btn-lg btn-info" disabled>提交评论</button>
    </form>
@else
    <form action="{{ URL('dishes/comments') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="dish_id" value="{{$dish->id}}">
        <textarea name="content" rows="10" class="form-control" required="required"></textarea>
        <br>
        <button class="btn btn-lg btn-info">提交评论</button>
    </form>
@endif









@endsection

















