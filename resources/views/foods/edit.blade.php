@extends ('layouts.master')
{{--<script   language="javascript">--}}
    {{--var count= 0;--}}
    {{--var maxfile = 20;--}}
    {{--//增加元素--}}
    {{--function addUpload() {--}}
        {{--if(count >= maxfile)    return;--}}
        {{--count++;--}}
        {{--var newDiv = "<div id=divUpload" + count +">"--}}
                {{--+ "<label for=element" + count + ">营养成分" + count + "</label>"--}}
                {{--+ "<textarea name=element" + count + " rows=4 class=form-control required=required></textarea>"--}}
                {{--+ "<label for=volume" + count + ">含量" + count + "</label>"--}}
                {{--+ "<input name=volume" + count + " rows=10 class=form-control required=required value={{$elements->volume}}>"--}}
                {{--+"<br>"--}}
                {{--+ " </div>";--}}

        {{--document.getElementById("uploadContent").insertAdjacentHTML("beforeEnd", newDiv);--}}
        {{--document.getElementById('count').innerHTML = "<input type=hidden name=step_count value="+count+">";--}}
    {{--}--}}
    {{--//删除指定元素--}}
    {{--function delUpload() {--}}
        {{--var lastDiv = "divUpload"+count;--}}
        {{--if(count > 0)--}}
            {{--count--;--}}
        {{--document.getElementById(lastDiv).parentNode.removeChild(document.getElementById(lastDiv));--}}
        {{--document.getElementById('count').innerHTML = "<input type=hidden name=step_count value="+count+">";--}}
    {{--}--}}
    {{--function addCount() {--}}
        {{--count++;--}}
    {{--}--}}

{{--</script>--}}

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

            <div class="form-group">
                {!! Form::label('inventory', '库存:') !!}
                {!! Form::text('inventory', $food->inventory, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('unit', '单位:') !!}
                {!! Form::text('unit', $food->unit, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', '价格:') !!}
                {!! Form::text('price', $food->price, ['class'=>'form-control']) !!}
            </div>

            {!! Form::submit('提交',array('class'=>'btn btn-large btn-success btn-block')) !!}

            {!! Form::close() !!}
        </fieldset>
    </div>


@endsection