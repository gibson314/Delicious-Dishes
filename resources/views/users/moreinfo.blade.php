@extends('layouts.usermaster')
@section('content')

    <div class="container">
        <h1>请完善个人信息</h1>
    </div>
    <hr>
    <!--error detection-->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
    <form method="POST" action="http://localhost/dd/public/users/update" accept-charset="UTF-8" class="form-signup"><input name="_token" type="hidden" value="3w0XNqiEGT0gaTQeNaext7rPS16Ps8mlNOM5HWXv">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span1"></div>
                <div class="span8">
                    <fieldset>
                        <div class="form-group">
                            {{--<label for="sex">性别：</label>--}}
                            性别：&nbsp;&nbsp;&nbsp;&nbsp;
                            <input checked="checked" name="sex" type="radio" value="male" id="sex"> 男&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="sex" type="radio" value="female" id="sex"> 女&nbsp;&nbsp;&nbsp;&nbsp;
                        </div><br>

                        <div class="form-group">
                            <label for="age">年龄:</label>
                            <input class="form-control" name="age" type="text" id="age">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="birthday">出生日期:</label>
                            <input class="form-control" name="birthday" type="text" id="birthday">
                        </div><br>

                        <div class="form-group">
                            <label for="place">长期居住地:</label>
                            <input class="form-control" name="place" type="text" id="place">
                        </div><br>

                        <input class="btn btn-large btn-success" type="submit" value="提交">

                    </fieldset>
                </div>
            </div>
        </div>
    </form>

    {{--{!! Form::open(['url' => 'users/update', 'class' => 'form-signup']) !!}--}}
    {{--<div class="container">--}}
        {{--<fieldset>--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('sex', '性别：') !!}--}}
                {{--@if ($user->sex == 'male')--}}
                {{--{!! Form::radio('sex', 'male', true)!!} 男--}}
                {{--{!! Form::radio('sex', 'female')!!} 女--}}
                {{--@elseif($user->sex == 'female')--}}
                    {{--{!! Form::radio('sex', 'male')!!} 男--}}
                    {{--{!! Form::radio('sex', 'female', true)!!} 女--}}
                    {{--@else--}}
                    {{--{!! Form::radio('sex', 'male', true)!!} 男--}}
                    {{--{!! Form::radio('sex', 'female')!!} 女--}}
                {{--@endif--}}

            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('age', '年龄:') !!}--}}
                {{--{!! Form::text('age', $user->age , ['class' => 'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('birthday', '出生日期:') !!}--}}
                {{--{!! Form::text('birthday', $user->birthday, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('place', '长期居住地:') !!}--}}
                {{--{!! Form::text('place', $user->place, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}

            {{--{!! Form::submit('提交',array('class'=>'btn btn-large btn-success btn-block')) !!}--}}

            {{--{!! Form::close() !!}--}}
        {{--</fieldset>--}}
    {{--</div>--}}

@endsection