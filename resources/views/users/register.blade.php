@extends('layouts.blankmaster')
@section('content')

<h1>欢迎注册</h1>
    <hr>
    <div class="container">
       <h4>{{ $message }}</h4>
        <br>
    </div>

    <!--error detection-->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="http://localhost/dd/public/users/create" accept-charset="UTF-8" class="form-signup"><input name="_token" type="hidden" value="3w0XNqiEGT0gaTQeNaext7rPS16Ps8mlNOM5HWXv">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="container">
            <fieldset>
                <div class="form-group">
                    <label for="username">用户名(英文或数字，3-20个字符)：</label>
                    <input placeholder="Username" class="form-control" name="username" type="text" id="username">

                </div>
                <br>
                <div class="form-group">
                    <label for="email">邮箱:</label>
                    <input placeholder="example@163.com" class="form-control" name="email" type="email" id="email">
                </div>
                <br>
                <div class="form-group">
                    <label for="password">密码(6-20个字符):</label>
                    <input placeholder="Password" class="form-control" name="password" type="password" value="" id="password">

                </div>
                <br>
                <div class="form-group">
                    <label for="password_confirmation">确认密码:</label>
                    <input placeholder="Please input your password again" class="form-control" name="password_confirmation" type="password" value="" id="password_confirmation">
                </div><br>

                <input class="btn btn-middle btn-success" type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;注册&nbsp;&nbsp;&nbsp;&nbsp;">

            </fieldset>
        </div>
    </form>

    {{--{!! Form::open(['url' => 'users/create', 'class' => 'form-signup']) !!}--}}
    {{--<div class="container">--}}
        {{--<fieldset>--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('username', '用户名(英文或数字，3-20个字符)：') !!}--}}
                {{--{!! Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}--}}

            {{--</div>--}}
            {{--<br>--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('email', '邮箱:') !!}--}}
                {{--{!! Form::email('email', null, ['placeholder'=> 'example@163.com', 'class' => 'form-control']) !!}--}}
            {{--</div>--}}
            {{--<br>--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('password', '密码(6-20个字符):') !!}--}}
                {{--{!! Form::password('password', ['placeholder'=>'Password', 'class'=>'form-control']) !!}--}}

            {{--</div>--}}
            {{--<br>--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('password_confirmation', '确认密码:') !!}--}}
                {{--{!! Form::password('password_confirmation', ['placeholder'=>'Please input your password again', 'class'=>'form-control']) !!}--}}
            {{--</div>--}}

            {{--{!! Form::submit('注册',array('class'=>'btn btn-large btn-success btn-block')) !!}--}}

            {{--{!! Form::close() !!}--}}
        {{--</fieldset>--}}
    {{--</div>--}}


@stop