
@extends('layouts.master')
@section('content')
    <h1>菜谱信息</h1>
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

            </tbody>
        </table>
    </div>

    <h2>主题图片</h2>
    <img src={{$dish->TitleImg}} alt='Dish Picture' />

@endsection