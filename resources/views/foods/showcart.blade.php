@extends('layouts.foodmaster')

@section('content')
    <h1>购物车</h1>
    <br>
    <a href="{{url('foods')}}"><button class="btn btn-middle" type="submit">继续购物</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{url('foods/check')}}"><button class="btn btn-middle" type="submit">结账</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{url('foods/clear')}}"><button class="btn btn-middle" type="submit">清空购物车</button></a>
    <hr style=" height:2px;border:none;border-top:2px dotted #185598;" />
    <div style="text-align: center">
        <table valign="middle">
            <tbody>
            <tr>
                <th width="200px">食材名称</td>
                <th width="200px">数量</td>
                <th width="200px">单价</td>
                <th width="200px">单食材总价</td>
            </tr>
            </tbody>
        </table>
        <br>
        @foreach($carts as $cart)
            <table valign="middle" align="left">
                <tbody>
                <tr>
                    <td width="200px">{{$cart->name}}</td>
                    <td width="200px">{{$cart->qty}}</td>
                    <td width="200px">{{$cart->price}}</td>
                    <td width="200px">{{$cart->subtotal}}</td>
                </tr>
                </tbody>
            </table>
            {{--{{$cart->name}} & {{$cart->qty}} &  {{$cart->price}} & {{$cart->subtotal}}--}}
            <br>
        @endforeach
        <hr style=" height:2px;border:none;border-top:2px dotted #185598;" />
        <table valign="middle" align="left">
            <tbody>
            <tr>
                <td width="200px">总价</td>
                <td width="200px">{{$total}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <hr style=" height:2px;border:none;border-top:2px dotted #185598;" />
    {{--<button class="btn btn-middle" type="submit"><a href="{{url('foods')}}">继续购物</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
    {{--<button class="btn btn-middle" type="submit"><a href="{{url('foods/check')}}">结账</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
    {{--<button class="btn btn-middle" type="submit"><a href="{{url('foods/clear')}}">清空购物车</a></button>--}}
@endsection