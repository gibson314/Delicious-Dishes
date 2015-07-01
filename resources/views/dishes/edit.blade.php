@extends ('layouts.master')

@section('content')
    <h1>编辑</h1>

    <hr/>


    <div class="container">
        <fieldset>
            {!! Form::open(['action' => ['DishesController@update', $dish->id], 'method' => 'PUT'] ) !!}

            <div class="form-group">
                {!! Form::label('name', '名称:') !!}
                {!! Form::text('name', $dish->name, ['class' => 'form-control']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('intro', '简介:') !!}
                {!! Form::text('intro', $dish->intro, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tag', '标签:') !!}
                {!! Form::text('tag', $dish->tag, ['class' => 'form-control']) !!}


            </div>

            <div class="form-group">
                {!! Form::label('tip', '小贴士:') !!}
                {!! Form::text('tip', $dish->tip, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('TitleImg', '图片:') !!}
                {!! Form::text('TitleImg', $dish->TitleImg, [ 'class'=>'form-control']) !!}
            </div>

            {!! Form::submit('提交',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>


@endsection