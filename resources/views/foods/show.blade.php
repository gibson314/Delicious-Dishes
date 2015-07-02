<<<<<<< HEAD
@extends('layouts.foodmaster')
=======
@extends('layouts.master')
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
>>>>>>> origin/master
@section('content')

    <h2>主题图片</h2>
    <img src={{$food->img}} alt='Food Picture' />
    <h1>食材信息</h1>
    {!! link_to_route('foods.edit', '编辑', $food->name) !!}




    <br>
    <br>
    <br>
    <br>
    <br>

    <p>库存：{{$food->inventory}}个</p>
    <p>单价：{{$food->price}}元</p>


    {{--购物车模块--}}
<form action="{{ URL('foods/addtocart') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="container">
        <a href="javascript:addCount()"><span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span></a>
        <div id="count">
            <input type=text name=count value=1 size="2">
        </div>
        <a href="javascript:delCount()"><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a>
    </div>

    <input type="hidden" name="food_name" value={{$food->name}}>


    <button class="btn btn-sm btn-info">添加到购物车</button>
</form>


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