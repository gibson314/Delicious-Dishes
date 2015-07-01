
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

            </tbody>
        </table>
    </div>

    <h2>主题图片</h2>
    <img src={{$dish->TitleImg}} alt='Dish Picture' />




@section('comments')
    <h2>评论</h2>
    <form action="{{ URL('admin/pages') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="dish_id" value="{{$dish->id}}">
        <textarea name="content" rows="10" class="form-control" required="required"></textarea>
        <br>
        <button class="btn btn-lg btn-info">提交评论</button>
    </form>
@endsection