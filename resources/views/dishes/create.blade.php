@extends ('layouts.dishmaster')

<script   language="javascript">
    var count= 0 ;
    var maxfile = 20;
    //增加元素
    function addUpload() {
        if(count >= maxfile)    return;//限制最多maxfile个文件框
        count++;
        //自增id不同的HTML对象，并附加到容器最后
//            var newDiv =  "<div id=divUpload" + count +">"
//                    + " <input id=file" + count + " type=file size=50 name=upload>"
//                    + " <a href=javascript:delUpload('divUpload" + count + "');>删除</a>"
//                    + " </div>";
        var newDiv = "<div id=divUpload" + count +">"
                + "<label for=content" + count + ">步骤" + count + "</label>"
                + "<textarea name=content" + count + " rows=4 class=form-control required=required></textarea>"
                + "<label for=photo" + count + ">图片" + count + "</label>"
                + "<input name=photo" + count + " rows=10 class=form-control required=required>"
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

@section('content')
    <h1>Create a new dish</h1>

    <hr/>


    {{--<div class="container">--}}
        {{--<fieldset>--}}
            {{--{!! Form::open(['url' => '/dishes']) !!}--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('name', '名称：') !!}--}}
                {{--{!! Form::text('name', null, ['class' => 'form-control', 'type'=>'hidden']) !!}--}}

            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('intro', '简介:') !!}--}}
                {{--{!! Form::text('intro', null, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('tag', '标签:') !!}--}}
                {{--{!! Form::text('tag', null, ['placeholder' => '上海菜 清淡 甜', 'class' => 'form-control']) !!}--}}


            {{--</div>--}}


            {{--<div id = "count">--}}

            {{--</div>--}}

            {{--<form   action="{{ URL('dishes') }}"   method="post">--}}
                {{--<div>--}}
                    {{--<table>--}}
                        {{--<tr>--}}
                            {{--<td  id="tdRrmove"   width="2000">--}}
                                {{--<div id="uploadContent">--}}
                                {{--</div>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</div>--}}
                {{--<a href="javascript:addUpload()">添加步骤</a>--}}
                {{--<a href="javascript:delUpload()">删除步骤</a>--}}
                {{--<br/>--}}

                {{--<br/>--}}
            {{--</form>--}}


            {{--<div class="form-group">--}}
                {{--{!! Form::label('tip', '小贴士:') !!}--}}
                {{--{!! Form::text('tip', null, ['class'=>'form-control']) !!}--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--{!! Form::label('TitleImg', '图片:') !!}--}}
                {{--{!! Form::text('TitleImg', null, ['class'=>'form-control']) !!}--}}
            {{--</div>--}}
            {{----}}
            {{--{!! Form::submit('提交',array('class'=>'btn btn-large btn-success btn-block')) !!}--}}

            {{--{!! Form::close() !!}--}}

            <div class="form-group">
                <form action="{{ URL('dishes') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="name">名称</label>
                    <input type="text" name="name" class="form-control" required="required" id="name">
                    <br>
                    <label for="name">简介</label>
                    <p>简介<input type="text" name="intro" class="form-control" required="required"></p>
                    <br>
                    <p>标签<input type="text" name="tag" class="form-control" required="required"></p>
                    <br>
                    <p>小贴士<input type="text" name="tip" class="form-control" required="required"></p>
                    <br>
                    <p>图片<input type="text" name="TitleImg" class="form-control" required="required"></p>
                    <br>


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
                    <a href="javascript:addUpload()">添加步骤</a>
                    <a href="javascript:delUpload()">删除步骤</a>
                    <br/>

                    <br/>
                    {{--添加删除步骤 完成--}}



                    <button class="btn btn-lg btn-info">提交</button>
                </form>
            </div>
        </fieldset>
    </div>


@endsection