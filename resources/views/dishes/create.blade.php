@extends ('layouts.master')

@section('content')
    <h1>Create a new dish</h1>

    <hr/>


    <div class="container">
        <fieldset>
            {!! Form::open(['url' => '/dishes']) !!}
            <div class="form-group">
                {!! Form::label('name', '名称：') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'type'=>'hidden']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('intro', '简介:') !!}
                {!! Form::text('intro', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tag', '标签:') !!}
                {!! Form::text('tag', null, ['placeholder' => '上海菜 清淡 甜', 'class' => 'form-control']) !!}


            </div>

            <div class="form-group">
                {!! Form::label('tip', '小贴士:') !!}
                {!! Form::text('tip', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('TitleImg', '图片:') !!}
                {!! Form::text('TitleImg', null, ['class'=>'form-control']) !!}
            </div>

            {!! Form::submit('提交',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>


@endsection