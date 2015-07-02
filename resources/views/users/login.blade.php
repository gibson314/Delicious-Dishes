@extends('layouts.master')
@section('content')

    <hr/>

<h1>欢迎登录</h1>
@if ($message)
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif
    <!--error detection-->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    {{--{!! Form::open(['url' => 'users/signin', 'class' => 'form-signup']) !!}--}}
    <div class="container">
        <fieldset>
            <div class="form-group">
            {{--<div class="form-group">--}}
                {{--{!! Form::label('name_mail', '用户名或邮箱：') !!}--}}
                {{--{!! Form::text('name_mail', null, ['placeholder' => 'Username/Email', 'class' => 'form-control']) !!}--}}

            {{--</div>--}}


            {{--<div class="form-group">--}}
                {{--{!! Form::label('password', '密码:') !!}--}}
                {{--{!! Form::password('password', ['placeholder'=>'Password', 'class'=>'form-control']) !!}--}}

            {{--</div>--}}
            {{--{!! Form::submit('登录',array('class'=>'btn btn-large btn-success btn-block')) !!}--}}

            {{--{!! Form::close() !!}--}}

            <form action="{{ URL('users/signin') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <p>用户名/邮箱<input type="text" name="name_mail" class="form-control" required="required"></p>
                <br>
                <p>密码<input type="text" name="password" class="form-control" required="required"></p>
                <br>
                <button class="btn btn-lg btn-info">登录</button>
            </form>
            </div>
        </fieldset>
    </div>


@stop