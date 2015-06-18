@extends('layouts.master')
@section('content')

    <hr/>

<h1>欢迎登录</h1>

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

    {!! Form::open(['url' => 'users/signin', 'class' => 'form-signup']) !!}
    <div class="container">
        <fieldset>
            <div class="form-group">
                {!! Form::label('name_mail', '用户名或邮箱：') !!}
                {!! Form::text('name_mail', null, ['placeholder' => 'Username/Email', 'class' => 'form-control']) !!}

            </div>


            <div class="form-group">
                {!! Form::label('password', '密码:') !!}
                {!! Form::password('password', ['placeholder'=>'Password', 'class'=>'form-control']) !!}

            </div>


            {!! Form::submit('登录',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>


@stop