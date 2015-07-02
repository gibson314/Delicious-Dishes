@extends ('layouts.master')

@section('content')
    <h1>Query!!!!</h1>

    <hr/>


    <div class="container">
        <fieldset>
            {!! Form::open(['url' => 'query/result']) !!}
            <div class="form-group">
                {!! Form::label('dishes', '菜谱:') !!}
                {!! Form::text('dishes1', null, ['class' => 'form-control']) !!}
                    {!! Form::radio('op1', 'and', true)!!} 与
                    {!! Form::radio('op1', 'or')!!} 或
                    {!! Form::radio('op1', 'not')!!}  不含
                {!! Form::text('dishes2', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('foods', '食材:') !!}
                {!! Form::text('foods1', null, ['class' => 'form-control']) !!}
                {!! Form::radio('op2', 'and', true)!!} 与
                {!! Form::radio('op2', 'or')!!} 或
                {!! Form::radio('op2', 'not')!!}  不含
                {!! Form::text('foods2', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('author', '作者:') !!}
                {!! Form::text('author1', null, ['class' => 'form-control']) !!}
                {!! Form::radio('op3', 'and', true)!!} 与
                {!! Form::radio('op3', 'or')!!} 或
                {!! Form::radio('op3', 'not')!!}  不含
                {!! Form::text('author2', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tag', 'tag:') !!}
                {!! Form::text('tag1', null, ['class' => 'form-control']) !!}
                {!! Form::radio('op4', 'and', true)!!} 与
                {!! Form::radio('op4', 'or')!!} 或
                {!! Form::radio('op4', 'not')!!}  不含
                {!! Form::text('tag2', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', '内容:') !!}
                {!! Form::text('content1', null, ['class' => 'form-control']) !!}
                {!! Form::radio('op5', 'and', true)!!} 与
                {!! Form::radio('op5', 'or')!!} 或
                {!! Form::radio('op5', 'not')!!}  不含
                {!! Form::text('content2', null, ['class' => 'form-control']) !!}
            </div>


            {!! Form::submit('查询',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>


@endsection