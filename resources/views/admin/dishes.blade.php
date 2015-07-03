
@extends ('layouts.adminmaster')

@section('content')


    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>菜谱编号</th>
                <th>菜谱名称</th>
                <th>上传日期</th>
                <th>菜谱简介</th>
                <th>操作</th>
            </tr>
            @foreach($dishes as $dish)
                <tr>
                    <td>
                        {{$dish->id}}
                    </td>
                    <td>
                        <a href="{{url('dishes',$dish->id)}}">{{$dish->name}}
                        </a>
                    </td>
                    <td>
                        {{$dish->publish_date}}
                    </td>
                    <td>
                        {{$dish->intro}}
                    </td>
                    <td>
                        {{--{!! Form::open(--}}
                        {{--['action' => ['FoodsController@del', $food->name],--}}
                        {{--'method' => 'POST',--}}
                        {{--'style' => 'display: inline;'--}}
                        {{--])--}}
                        {{--!!}--}}
                        {{--<button type="button" class="btn btn-primar">--}}
                        {{--Delete--}}
                        {{--</button>--}}
                        {{--{!! Form::close() !!}--}}
                        <div class="form-group">
                            <form action="{{ URL('dishes/del') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="delid" value="{{$dish->id}}">
                                <button class="btn btn-sm btn-info">删除</button>
                            </form>
                        </div>
                    </td>


                </tr>
            @endforeach
        </table>
    </div>


    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="pagination pagination-centered pagination-large">
                    <?php echo($dishes->render())?>                </div>
            </div>
        </div>
    </div>
@endsection