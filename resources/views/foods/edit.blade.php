@extends ('layouts.master')

@section('content')
    <h1>编辑</h1>

    <hr/>


    <div class="container">
        <fieldset>
            {!! Form::open(['action' => ['FoodsController@update', $food->name], 'method' => 'PUT'] ) !!}
            <div class="form-group">
                {!! Form::label('name', '名称:') !!}
                {!! Form::text('name',$food->name, ['class' => 'form-control']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('intro', '简介:') !!}
                {!! Form::text('intro',$food->intro, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('detail', '详细介绍:') !!}
                {!! Form::text('detail',$food->detail, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('img', '图片:') !!}
                {!! Form::text('img', $food->img, ['class'=>'form-control']) !!}
            </div>

            {!! Form::submit('提交',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>


@endsection