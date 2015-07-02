@extends('layouts.master')

@section('content')
<h1>购物车</h1>
    @foreach($carts as $cart)

        {{$cart->name}} & {{$cart->qty}} &  {{$cart->price}} & {{$cart->subtotal}}


        <br>
    @endforeach
    总价：{{$total}}

<a href="{{url('foods')}}">继续购物</a>
<a href="{{url('foods/check')}}">结账</a>
<a href="{{url('foods/clear')}}">清空购物车</a>
@endsection