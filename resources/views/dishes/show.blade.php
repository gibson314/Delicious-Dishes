
@extends('layouts.dishmaster')
@section('content')


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
    <a name="comments"></a>
    <h2>评论</h2>
    <ol>
        @foreach($comments as $comment)
            <?php $cauthor=\App\User::where('id',$comment->author_id)->first();?>
                <li/><a href="{{ url('author',$comment->author_id) }}">{{$cauthor->username}}</a>: <p/>{{$comment->content}}<br/>
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
        <input type="radio" name="rate" value=1>不满意
        <input type="radio" name="rate" value=2>还行
        <input type="radio" name="rate" value=3>一般
        <input type="radio" name="rate" value=4>满意
        <input type="radio" name="rate" value=5>很满意
        <textarea name="content" rows="10" class="form-control" required="required"></textarea>
        <br>
        <button class="btn btn-lg btn-info">提交评论</button>
    </form>
    @endif
@endsection