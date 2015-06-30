@extends('layouts.master')
@section('content')
<h1>个人信息</h1>
    <li>用户名： {{$user->username}}</li>
    <li>邮箱： {{$user->email}}</li>
    <li>性别： {{$user->sex}}</li>
    <li>年龄： {{$user->age}}</li>
    <li>出生日期： {{$user->birthday}}</li>
    <li>常住地： {{$user->place}}</li>

    <h4><a href="{{ url('/users/moreinfo') }}">{{ '修改资料'}}</a></h4>

@endsection