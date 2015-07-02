
@extends('layouts.foodmaster')


<script>
    var count = 1;
    function addCount() {
        count++;
//        document.getElementById('count').innerHTML = "<input type=text name=count value="+count+">";
        document.getElementById('count').innerHTML = "<input class=text_box name=count type=text value="+count+" style=width:50px; />";
    }
    function delCount(){
        if (count > 1)
            count--;
        document.getElementById('count').innerHTML = "<input class=text_box name=count type=text value="+count+" style=width:50px; />";
    }
</script>

@section('content')
    {!! link_to_route('foods.edit', '编辑', $food->name) !!}

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9">
                <div class="row-fluid">
                    <div class="span4">
                        <img src={{$food->img}} alt='Food Picture' />
                    </div>
                    <div class="span8">
                        <dl>
                            <dt><h3>{{$food->name}}
                            </h3>
                            {{--收藏食物--}}
                            @if(\Illuminate\Support\Facades\DB::table('user_fav_food')
                            ->where('user_id',Auth::user()->id)
                            ->where('food_name', $food->name)->first()
                            )
                                <form action="{{ URL('users/unfav2') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="food_name" value="{{$food->name}}">
                                    <button class="btn btn-middle btn-success">取消收藏</button>
                                    @else


                                        <form action="{{ URL('users/fav2') }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="food_name" value="{{$food->name}}">
                                            <button class="btn btn-middle btn-info">收藏</button>
                                            {{--<button class="btn btn-lg btn-info"><img src="/resources/image/before.png"></button>--}}

                                        </form>
                                    @endif


                                </form>
                                {{--收藏食物 结束--}}
                            </dt>
                            <dd>
                                <div id="txt">
                                    {{$food->intro}}
                                </div>
                            </dd>

                        </dl>
                    </div>
                </div>
                <br><br><br>
                <div class="row-fluid">
                    <div class="span6">
                        <table valign="middle" align="left">
                            <tbody>
                            <tr>
                                <td scope="row" width="20%">
                                    <B>库存：</B>
                                </td>
                                <td scope="row" width="30%">
                                    {{$food->inventory}}{{$food->unit}}
                                </td>
                                <td scope="row" width="20%">
                                    <B>单价：</B>
                                </td>
                                <td scope="row" width="30%">
                                    {{$food->price}}元
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="span6">
                        <div class="row-fluid">
                        {{--购物车模块--}}
<<<<<<< HEAD
                        <form action="{{ URL('foods/addtocart') }}" method="post">
=======
                        <form action="{{ URL('foods/addtocart') }}" method="POST">
>>>>>>> origin/master
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row-fluid">
                                <div class="span1" >
                                    <a href="javascript:addCount()">
                                        +
                                    </a>
                                </div>
                                <div class="span5" id="count">
                                    <input class="text_box" name="count" type="text" value=1 />
                                </div>
                                <div class="span2">
                                <a href="javascript:delCount()">
                                -
                                </a>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-info">添加到购物车</button>
                                </div>
                            </div>

                            <input type="hidden" name="food_name" value={{$food->name}}>
                            {{--<button class="btn btn-sm btn-info">添加到购物车</button>--}}
                        </form>
                            </div>
                    </div>
                </div>
                <table class="table" contenteditable="false" valign="center">
                    <tbody>
                    <tr>
                        <th scope="row" width="10%">
                            <h4>名称</h4>
                        </th>
                        <td valign="middle" scope="row" width="15%">
                            {{$food->name}}
                        </td>
                        <td width="5%"></td>
                        <td colspan="1" rowspan="2">
                            <h4>简介</h4>
                            <hr>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$food->intro}}
                        </td>
                    </tr>

                    <tr>

                        <th scope="row">
                            <h4>营养成分</h4>
                        </th>
                        <td scope="row">
                            @foreach($elements as $element)
                                {{$element->element}} {{$element->volume}}<br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" scope="row">
                            <h4>详细信息</h4>
                            <hr>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$food->detail}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" scope="row">
                            <h4>相关菜谱</h4><hr>
                            @foreach($dishes as $dish)
                                <h4><a href="{{ url('/dishes',$dish->id) }}">{{$dish->name}}</a><br></h4>
                                <h2><a href="{{ url('/dishes',$dish->id) }}"><img src="{{$dish->TitleImg}}"/></a></h2>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$dish->intro}}
                                <hr>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="span3">

                <h1>购物车</h1>
                <?php $carts = Cart::content(); $total = Cart::total(); ?>
                <table valign="middle">
                    <tbody>
                    <tr>
                        <th width="50px">Name</td>
                        <th width="30px">Quan</td>
                        <th width="40px">Price</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                @foreach($carts as $cart)
                    <table valign="middle" align="middle">
                        <tbody>
                        <tr>
                            <td width="50px">{{$cart->name}}</td>
                            <td width="30px">{{$cart->qty}}</td>
                            <td width="40px">{{$cart->subtotal}}</td>
                        </tr>
                        </tbody>
                    </table>


                    <hr>
                @endforeach
                总价：{{$total}}
                <br><br>
                <button class="btn btn-middle" type="submit"><a href="{{url('foods/showcart')}}">结算</a></button>


            </div>
        </div>
    </div>

    {{--<h2>主题图片</h2>--}}
    {{--<img src={{$food->img}} alt='Food Picture' />--}}
    {{--<h1>食材信息</h1>--}}
    {{----}}




    {{--<br>--}}
    {{--<br>--}}
    {{--<br>--}}
    {{--<br>--}}
    {{--<br>--}}

    {{--<p>库存：{{$food->inventory}}{{$food->unit}}</p>--}}
    {{--<p>单价：{{$food->price}}元</p>--}}





    {{--<div class="container">--}}
        {{--<table class="table">--}}
            {{--<tbody>--}}

            {{--<tr>--}}
                {{--<td>名称</td>--}}
                {{--<td> {{$food->name}}</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>简介</td>--}}
                {{--<td>{{$food->intro}}</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>营养成分</td>--}}
                {{--<td>--}}
                    {{--@foreach($elements as $element)--}}
                       {{--{{$element->element}} {{$element->volume}}<br>--}}
                    {{--@endforeach</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>营养价值</td>--}}
                {{--<td> {{$food->detail}}</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>菜谱</td>--}}
                {{--<td>--}}
                    {{--@foreach($dishes as $dish)--}}
                        {{--<h2><a href="{{ url('/dishes',$dish->id) }}"><img src="{{$dish->TitleImg}}"/></a></h2>--}}
                        {{--<h2><a href="{{ url('/dishes',$dish->id) }}">{{$dish->name}}</a><br></h2>--}}
                        {{--{{$dish->intro}}--}}
                {{--@endforeach</td>--}}
            {{--</tr>--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--</div>--}}
@endsection