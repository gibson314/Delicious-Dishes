@extends ('layouts.querymaster')

@section('content')
    <h1>精确搜索</h1>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;点击返回<a href="query">普通搜索</a></p>
    <hr/>




    <div class="container" style="text-align: center">
        <fieldset>
            <form method="POST" action="http://localhost/dd/public/query/result" accept-charset="UTF-8"><input name="_token" type="hidden" value="3w0XNqiEGT0gaTQeNaext7rPS16Ps8mlNOM5HWXv">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    {{--<label for="dishes">菜谱:</label>--}}
                    菜谱：
                    <input class="form-control" name="dishes1" type="text">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input checked="checked" name="op1" type="radio" value="and"> 与&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="op1" type="radio" value="or"> 或&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="op1" type="radio" value="not">  不含&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control" name="dishes2" type="text">
                </div>
                <br>
                <div class="form-group">
                    食材：
                    {{--<label for="foods">食材:</label>--}}
                    <input class="form-control" name="foods1" type="text">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input checked="checked" name="op2" type="radio" value="and"> 与&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="op2" type="radio" value="or"> 或&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="op2" type="radio" value="not">  不含&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control" name="foods2" type="text">
                </div><br>
                <div class="form-group">
                    作者：
                    {{--<label for="author">作者:</label>--}}
                    <input class="form-control" name="author1" type="text">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input checked="checked" name="op3" type="radio" value="and"> 与&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="op3" type="radio" value="or"> 或&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="op3" type="radio" value="not">  不含&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control" name="author2" type="text">
                </div><br>
                <div class="form-group">
                    {{--<label for="tag">tag:</label>--}}
                    标签：
                    <input class="form-control" name="tag1" type="text">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input checked="checked" name="op4" type="radio" value="and"> 与&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="op4" type="radio" value="or"> 或&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="op4" type="radio" value="not">  不含&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control" name="tag2" type="text">
                </div><br>
                <div class="form-group">
                    内容：
                    {{--<label for="content">内容:</label>--}}
                    <input class="form-control" name="content1" type="text">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input checked="checked" name="op5" type="radio" value="and"> 与&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="op5" type="radio" value="or"> 或&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="op5" type="radio" value="not">  不含&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control" name="content2" type="text">
                </div>

                <br><br>
                <button class="btn btn-middle btn-success" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;查询&nbsp;&nbsp;&nbsp;&nbsp;</button>

            </form>
        </fieldset>
    </div>


@endsection