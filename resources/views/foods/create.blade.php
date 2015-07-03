@extends ('layouts.foodmaster')

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
                    + "<textarea name=element" + count + " rows=1 class=form-control required=required></textarea> "
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
    {{--+ "<textarea name=element" + count + " rows=4 class=form-control required=required></textarea>"--}}


    <h1>Create a new food</h1>

    <hr/>


    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span1"></div>
            <div class="span8">
                <fieldset>
                    <form method="POST" action="http://localhost/dd/public/foods" accept-charset="UTF-8"><input name="_token" type="hidden" value="3w0XNqiEGT0gaTQeNaext7rPS16Ps8mlNOM5HWXv">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">名称:</label>
                            <input class="form-control" name="name" type="text" id="name">

                            <div class="form-group">
                                <label for="intro">简介:</label>
                                <textarea name="intro"  id="txtLy" rows="4" class="form-control" required="required" ></textarea>
                                {{--<input class="form-control" name="intro" type="text" id="intro">--}}
                            </div>
                        </div>
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

                        <div class="form-group">
                            <label for="detail">营养价值:</label>
                            <textarea name="detail"  id="txtLy" rows="4" class="form-control" required="required" id="detail"></textarea>
                            {{--<input class="form-control" name="detail" type="text" id="detail">--}}
                        </div>

                        <div class="form-group">
                            <label for="img">图片(URL):</label>
                            <input class="form-control" name="img" type="text" id="img">
                        </div>
                        <input class="btn btn-large" type="submit" value="提交">


                    </form>
                </fieldset>
            </div>
        </div>
    </div>

@endsection