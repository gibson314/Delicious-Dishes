@extends('layouts.master')
@section('content')

    <hr/>

<h1>欢迎注册</h1>
    <div class="container">
       <h4>{{ $message }}</h4>
    </div>

    <!--error detection-->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    {!! Form::open(['url' => 'users/create', 'class' => 'form-signup']) !!}
    <div class="container">
        <fieldset>
            <div class="form-group">
                {!! Form::label('username', '用户名(英文或数字，3-20个字符)：') !!}
                {!! Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('email', '邮箱:') !!}
                {!! Form::email('email', null, ['placeholder'=> 'example@163.com', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', '密码(6-20个字符):') !!}
                {!! Form::password('password', ['placeholder'=>'Password', 'class'=>'form-control']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', '确认密码:') !!}
                {!! Form::password('password_confirmation', ['placeholder'=>'Please input your password again', 'class'=>'form-control']) !!}
            </div>

            {!! Form::submit('注册',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>


@stop