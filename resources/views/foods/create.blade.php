@extends ('layouts.master')

@section('content')
    <script   language="javascript">
        var count= 0;
        var maxfile = 20;
        //增加元素
        function addUpload() {
            if(count >= maxfile)    return;
            count++;
            var newDiv = "<div id=divUpload" + count +">"
                    + "<label for=element" + count + ">营养成分" + count + "</label>"
                    + "<textarea name=element" + count + " rows=4 class=form-control required=required></textarea>"
                    + "<label for=volume" + count + ">含量" + count + "</label>"
                    + "<input name=volume" + count + " rows=10 class=form-control required=required>"
                    +"<br>"
                    + " </div>";

            document.getElementById("uploadContent").insertAdjacentHTML("beforeEnd", newDiv);
            document.getElementById('count').innerHTML = "<input type=hidden name=step_count value="+count+">";
        }
        //删除指定元素
        function delUpload() {
            var lastDiv = "divUpload"+count;
            if(count > 0)
                count--;
            document.getElementById(lastDiv).parentNode.removeChild(document.getElementById(lastDiv));
            document.getElementById('count').innerHTML = "<input type=hidden name=step_count value="+count+">";
        }


    </script>
    <h1>Create a new food</h1>

    <hr/>


    <div class="container">
        <fieldset>
            {!! Form::open(['url' => 'foods']) !!}
            <div class="form-group">
                {!! Form::label('name', '名称:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}

                <div class="form-group">
                    {!! Form::label('intro', '简介:') !!}
                    {!! Form::text('intro', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            {{--添加、删除步骤--}}
            <div id = "count">

            </div>


            <div>
                <table>
                    <tr>
                        <td  id="tdRrmove"   width="2000">
                            <div id="uploadContent">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <a href="javascript:addUpload()">添加营养成分</a>
            <a href="javascript:delUpload()">删除营养成分</a>
            <br/>

            <br/>
            {{--添加删除步骤 完成--}}

            <div class="form-group">
                {!! Form::label('detail', '营养价值:') !!}
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