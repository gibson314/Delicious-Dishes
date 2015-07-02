
@extends('layouts.dishmaster')
@section('content')
    {!! link_to_route('dishes.edit', '编辑', $dish->id) !!}
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8">
                <h1>
                    {{$dish->name}}
                </h1>
                <hr>
                <p>
                    <a href="{{ url('/author',$dish->authorid) }}">{{$author->username}}</a><br>
                    上传于{{$dish->publish_date}}
                </p>
                <hr>
                <img src={{$dish->TitleImg}} alt='Dish Picture' height="300"/>
                <hr>
                <p><B>标签：</B>
                    {{$dish->tag}}
                </p>
                <table class="table">
                    <tbody>
                    <tr>
                        <td colspan="1" rowspan="2" scope="row" width="45%">
                            <dl>
                                <dt>菜品介绍:</dt>
                                <hr>
                                <dd>{{$dish->intro}}</dd>
                            </dl>
                        </td>
                        <td colspan="1" rowspan="2" scope="row" width="15%">
                        </td>
                        <td>
                            <dl>
                                <dt>食材:</dt>
                                <dd>
                                    <hr>
                                    @foreach($dishfoods as $dishfood)
                                        <a href="{{ url('/foods',$dishfood->food_name) }}">{{$dishfood->food_name}}({{$dishfood->volume}})</a><br/>
                                    @endforeach
                                </dd>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <dl>
                            <dt>工具:</dt>
                            <dd>
                                <hr>
                                @foreach($utensils as $utensil)
                                    {{$utensil->utensil_name}}<br/>
                                @endforeach
                            </dd>
                        </dl>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <hr>
                <br>

                <h4><B>步骤</B></h4>
                <table class="table">
                    <tbody>
                    @foreach($steps as $step)
                        <tr>
                            <td scope="row" width="50%">
                                <h5>Step {{$step->step_id}}:</h5> <hr> {{$step->description}}<br/>
                            </td>
                            <td scope="row">
                                <a href="{{ url($step->step_img) }}"><img src="{{$step->step_img}}"/></a>
                            </td>
                        </tr>
                        @endforeach
                    </hr>

                    </tbody>
                </table>
                <p>
                    <h4>小贴士：</h4>
                    {{$dish->tip}}
                </p>
            </div>
            <div class="span4">
                <ul class="nav nav-list">
                    <li class="nav-header">
                        列表标题
                    </li>
                    <li class="active">
                        <a href="#">首页</a>
                    </li>
                    <li>
                        <a href="#">库</a>
                    </li>
                    <li>
                        <a href="#">应用</a>
                    </li>
                    <li class="nav-header">
                        功能列表
                    </li>
                    <li>
                        <a href="#">资料</a>
                    </li>
                    <li>
                        <a href="#">设置</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">帮助</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('comments')
    <a name="comments"></a>
    <br><br><br>
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
        <hr>
        <textarea name="content" rows="10" class="form-control" required="required"></textarea>
        <br>
        <button class="btn btn-lg btn-info">提交评论</button>
    </form>
    @endif
@endsection