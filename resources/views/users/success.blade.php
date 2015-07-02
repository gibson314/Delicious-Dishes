@extends('layouts.blankmaster')

@section ('content')
    <h1>Login Successfully</h1>
    <hr>

    <button class="btn btn-middle" type="submit"><a href="{{ url('/') }}">{{ '返回首页 '}}</a></button>
@stop