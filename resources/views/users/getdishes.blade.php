@extends('layouts.usermaster')
@section('content')

    <h1>我的菜谱</h1>
    @foreach($dishes as $dish)
    <h3><a href="{{ url('/dishes',$dish->id) }}">{{$dish->name}}</a></h3>
        <p>{{$dish -> intro}}</p>
    @endforeach

    <a href="{{url ('/dishes/create')}}">添加新的菜谱</a>
@endsection
