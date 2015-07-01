
@extends('layouts.master')
@section('content')
    <h1>菜谱信息</h1>

    {!! link_to_route('dishes.edit', '编辑', $dish->id) !!}

    <div class="container">
        <table class="table">
            <tbody>

            <tr>
                <td>名称</td>
                <td> {{$dish->name}}</td>
            </tr>
            <tr>
                <td>作者</td>
                <td>{{$dish->author}}</td>
            </tr>
            <tr>
                <td>简介</td>
                <td> {{$dish->intro}}</td>
            </tr>
            <tr>
                <td>食材</td>
                <td>     @foreach($dishfoods as $dishfood)
                        <a href="{{ url('/foods',$dishfood->food_name) }}">{{$dishfood->food_name}}{{$dishfood->volume}}</a><br/>
                    @endforeach</td>
            </tr>
            <tr>
                <td>工具</td>
                <td>     @foreach($utensils as $utensil)
                        {{$utensil->utensil_name}}<br/>
                    @endforeach</td>
            </tr>
            </tbody>
        </table>
    </div>

        <h2>主题图片</h2>
    <img src={{$dish->TitleImg}} alt='Dish Picture' />

@endsection