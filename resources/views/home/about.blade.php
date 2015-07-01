@extends('layouts.master')

@section('content')

<h1>About us</h1>


{{$dish->name}}
    {{$dish->tip}}
    {{$dish->tag}}
    {{$dish->intro}}
    {{$dish->TitleImg}}


@endsection

