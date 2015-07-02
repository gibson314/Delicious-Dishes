@extends('layouts.usermaster')
@section('content')
    <hr/>


    <div class="container">
        <h4>请完善个人信息</h4>
    </div>

    <!--error detection-->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    {!! Form::open(['url' => 'users/update', 'class' => 'form-signup']) !!}
    <div class="container">
        <fieldset>
            <div class="form-group">
                {!! Form::label('sex', '性别：') !!}
                @if ($user->sex == 'male')
                {!! Form::radio('sex', 'male', true)!!} 男
                {!! Form::radio('sex', 'female')!!} 女
                @elseif($user->sex == 'female')
                    {!! Form::radio('sex', 'male')!!} 男
                    {!! Form::radio('sex', 'female', true)!!} 女
                    @else
                    {!! Form::radio('sex', 'male', true)!!} 男
                    {!! Form::radio('sex', 'female')!!} 女
                @endif

            </div>

            <div class="form-group">
                {!! Form::label('age', '年龄:') !!}
                {!! Form::text('age', $user->age , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('birthday', '出生日期:') !!}
                {!! Form::text('birthday', $user->birthday, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('place', '长期居住地:') !!}
                {!! Form::text('place', $user->place, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('提交',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>

@endsection