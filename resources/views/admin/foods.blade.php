@extends ('layouts.adminmaster')

@section('content')
    {{--@foreach ($foods as $food)--}}
        {{--<h2><a href="{{ url('/foods',$food->name) }}"><img src="{{$food->img}}"/></a></h2>--}}
        {{--<h2><a href="{{ url('/foods',$food->name) }}">{{$food->name}}</a></h2>--}}
        {{--<p>{{$food->intro}}<br></p>--}}
        {{--{!! link_to_route('foods.edit', '编辑', $food->name) !!}--}}
        {{--{!! link_to_route('foods.del', '删除', $food->name) !!}--}}
    {{--@endforeach--}}

    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>食物名称</th>
                <th>食物图片</th>
                <th>食物简介</th>
                <th>操作</th>
            </tr>
            @foreach($foods as $food)
                <tr>
                    <td>
                        <a href="{{url('foods',$food->name)}}">{{$food->name}}</a>
                    </td>
                    <td>
                        <img src="{{$food->img}}">
                    </td>
                    <td>
                        {{$food->intro}}
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
                            <form action="{{ URL('foods/del') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="delname" value="{{$food->name}}">
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
                    <?php echo($foods->render())?>                </div>
            </div>
        </div>
    </div>


@endsection