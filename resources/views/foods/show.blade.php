
@extends('layouts.foodmaster')


<script>
    var count = 1;
    function addCount() {
        count++;
        document.getElementById('count').innerHTML = "<input type=text name=count size=2 value="+count+">";
    }
    function delCount(){
        if (count > 1)
            count--;
        document.getElementById('count').innerHTML = "<input type=text name=count size=2 value="+count+">";
    }
</script>

@section('content')
    {!! link_to_route('foods.edit', '编辑', $food->name) !!}
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8">
                <div class="row-fluid">
                    <div class="span6">
                        <img src={{$food->img}} alt='Food Picture' />
                    </div>
                    <div class="span6">
                        <dl>
                            <dt><h3>{{$food->name}}
                            </h3>
                            </dt>
                            <dd>
                                {{$food->intro}}
                            </dd>

                        </dl>
                    </div>
                </div>
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
                        {{--购物车模块--}}
                        <form action="{{ URL('foods/addtocart') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="container">
                                <a href="javascript:addCount()">
                                    添加</span>
                                </a>

                                <div id="count">
                                    <input type=text name=count value=1 size="2">
                                </div>
                                <a href="javascript:delCount()">
                                    减少
                                </a>
                            </div>

                            <input type="hidden" name="food_name" value={{$food->name}}>


                            <button class="btn btn-sm btn-info">添加到购物车</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="span4">
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





    <div class="container">
        <table class="table">
            <tbody>

            <tr>
                <td>名称</td>
                <td> {{$food->name}}</td>
            </tr>
            <tr>
                <td>简介</td>
                <td>{{$food->intro}}</td>
            </tr>
            <tr>
                <td>营养成分</td>
                <td>
                    @foreach($elements as $element)
                       {{$element->element}} {{$element->volume}}<br>
                    @endforeach</td>
            </tr>
            <tr>
                <td>营养价值</td>
                <td> {{$food->detail}}</td>
            </tr>
            <tr>
                <td>菜谱</td>
                <td>
                    @foreach($dishes as $dish)
                        <h2><a href="{{ url('/dishes',$dish->id) }}"><img src="{{$dish->TitleImg}}"/></a></h2>
                        <h2><a href="{{ url('/dishes',$dish->id) }}">{{$dish->name}}</a><br></h2>
                        {{$dish->intro}}
                @endforeach</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection