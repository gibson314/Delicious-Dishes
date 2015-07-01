@extends('layouts.master')
@section('content')
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
                <td>营养价值</td>
                <td> {{$food->detail}}</td>
            </tr>

            </tbody>
        </table>
    </div>

    <h2>主题图片</h2>
    <img src={{$food->img}} alt='Food Picture' />

@endsection