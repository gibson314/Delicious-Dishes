@extends('layouts.foodmaster')
@section('content')

    <h2>主题图片</h2>
    <img src={{$food->img}} alt='Food Picture' />
    <h1>食材信息</h1>

    {!! link_to_route('foods.edit', '编辑', $food->name) !!}

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