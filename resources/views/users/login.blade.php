@extends('layouts.blankmaster')
@section('content')

    <hr>

<h1>欢迎登录</h1>
    <hr>
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
    <fieldset>
        <div class="form-group">
            <form action="{{ URL('users/signin') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="container">
                    <table align="left" style="text-align: left">
                        <tbody>
                        <tr>
                            <th scope="row" width="15%">用户名/邮箱</th>
                            <td scope="row" width="5%"></td>
                            <td><input type="text" name="name_mail" class="form-control" required="required"></td>
                        </tr>
                        <tr>
                            <td scope="row" height="20px"></td>
                        </tr>
                        <tr>
                            <th scope="row" width="15%">密码</th>
                            <td scope="row" width="5%"></td>
                            <td><input type="password" name="password" class="form-control" required="required"></td>
                        </tr>
                        <tr>
                            <td scope="row" height="20px"></td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-lg btn-info">登录</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </fieldset>

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




                {{--<p>用户名/邮箱</p>--}}
                {{--<br>--}}
                {{--<p>密码<input type="password" name="password" class="form-control" required="required"></p>--}}
                {{--<br>--}}
                {{--<button class="btn btn-lg btn-info">登录</button>--}}

    {{--</div>--}}


@stop