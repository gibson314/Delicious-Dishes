@extends('layouts.master')
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
                {!! Form::radio('sex', 'male', true)!!} 男
                {!! Form::radio('sex', 'female')!!} 女
            </div>

            <div class="form-group">
                {!! Form::label('age', '年龄:') !!}
                {!! Form::text('age', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('birthday', '出生日期:') !!}
                {!! Form::text('birthday', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('place', '长期居住地:') !!}
                {!! Form::text('place', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('提交',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>

@endsection