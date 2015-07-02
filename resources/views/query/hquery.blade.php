@extends ('layouts.master')

@section('content')
    <h1>Query!!!!</h1>

    <hr/>


    <div class="container">
        <fieldset>
            {!! Form::open(['url' => 'query/dishes']) !!}
            <div class="form-group">
                {!! Form::label('name', '菜谱:') !!}
                {!! Form::text('dishes1', null, ['class' => 'form-control']) !!}
                    {!! Form::radio('op', 'and', true)!!} 与
                    {!! Form::radio('op', 'or')!!} 或
                {!! Form::text('dishes2', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', '食材:') !!}
                {!! Form::text('dishes1', null, ['class' => 'form-control']) !!}
                {!! Form::radio('op', 'and', true)!!} 与
                {!! Form::radio('op', 'or')!!} 或
                {!! Form::text('dishes2', null, ['class' => 'form-control']) !!}
            </div>


            {!! Form::submit('查菜谱',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>

    <div class="container">
        <fieldset>
            {!! Form::open(['url' => 'query/foods']) !!}
            <div class="form-group">
                {!! Form::label('name', '关键词:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}

            </div>

            {!! Form::submit('查食材',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>

    <div class="container">
        <fieldset>
            {!! Form::open(['url' => 'query/author']) !!}
            <div class="form-group">
                {!! Form::label('name', '作者名:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}

            </div>

            {!! Form::submit('查作者',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>


@endsection