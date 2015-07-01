@extends('layouts.master')
@section('content')
    <h1>食材信息</h1>

    {!! link_to_route('foods.edit', '编辑', $food->name) !!}

    <div class="container">
        <table class="table">
            <tbody>

            <tr>
                <td>名称</td>
                <td> {{$dish->name}}</td>
            </tr>
            <tr>
                <td>简介</td>
                <td>{{$dish->intro}}</td>
            </tr>
            <tr>
                <td>营养成分</td>
                <td> {{$dish->detail}}</td>
            </tr>

            </tbody>
        </table>
    </div>

    <h2>主题图片</h2>
    <img src={{$dish->img}} alt='Food Picture' />

@endsection