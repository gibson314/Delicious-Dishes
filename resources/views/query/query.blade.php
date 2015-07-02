@extends ('layouts.querymaster')

@section('content')
    <h1>普通搜索</h1>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;点击进入<a href="hquery">高级搜索</a></p>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    </body>

    <hr/>

    <div class="container" style="text-align: center">
        <fieldset>
            <form method="POST" action="http://localhost/dd/public/query/dishes" accept-charset="UTF-8"><input name="_token" type="hidden" value="3w0XNqiEGT0gaTQeNaext7rPS16Ps8mlNOM5HWXv">
                <div class="form-group">
                    关键词：
                    {{--<label for="name">关键词:</label>--}}&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control" name="name" type="text" id="name">&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-middle btn-success" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;查菜谱&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>


                {{--<input class="btn btn-middle btn-success btn-block" type="submit" value="查菜谱">--}}

            </form>
        </fieldset>
        <br>
        <fieldset>
            <form method="POST" action="http://localhost/dd/public/query/foods" accept-charset="UTF-8"><input name="_token" type="hidden" value="3w0XNqiEGT0gaTQeNaext7rPS16Ps8mlNOM5HWXv">
                <div class="form-group">
                    关键词：
                    {{--<label for="name">关键词:</label>--}}&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control" name="name" type="text" id="name">&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-middle btn-success" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;查食材&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>

            </form>
        </fieldset>
        <br>
        <fieldset>
            <form method="POST" action="http://localhost/dd/public/query/author" accept-charset="UTF-8"><input name="_token" type="hidden" value="3w0XNqiEGT0gaTQeNaext7rPS16Ps8mlNOM5HWXv">
                <div class="form-group">
                    作者名：
                    {{--<label for="name">作者名:</label>--}}&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control" name="name" type="text" id="name">&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-middle btn-success" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;查作者&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>


            </form>
        </fieldset>
    </div>

    </div>



@endsection