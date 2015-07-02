@extends ('layouts.foodmaster')

@section('content')
    <h1>Create a new food</h1>

    <hr/>


    <div class="container">
        <fieldset>
            {!! Form::open(['url' => 'foods']) !!}
            <div class="form-group">
                {!! Form::label('name', '名称:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('intro', '简介:') !!}
                {!! Form::text('intro', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('detail', '详细介绍:') !!}
                {!! Form::text('detail', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('img', '图片:') !!}
                {!! Form::text('img', null, ['class'=>'form-control']) !!}
            </div>

            {!! Form::submit('提交',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>


@endsection