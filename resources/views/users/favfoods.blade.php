@extends ('layouts.usermaster')

@section('content')
    <h2>我喜爱的食材</h2>
    @foreach ($foods as $food)
        <div class="Empty">
            <p><br></p>
        </div>

        <div class="container-fluid" style="vertical-align: middle">
            <div class="row-fluid">
                <div class="span1"></div>
                <div class="span3">
                    <a href="{{ url('/foods',$food->name) }}"><img src="{{$food->img}}"/></a>
                </div>
                <div class="span8">
                    <table valign="middle"  align="left" class="table table-hover" contenteditable="false">
                        <tbody>
                        <tr>
                            <th scope="row" width="25%">
                                <ul>
                                    <li>食材名称</li>
                                </ul>
                            </th>
                            <td><a href="{{ url('/foods',$food->name) }}">{{$food->name}}</a></td>
                        </tr>
                        <tr>
                            <th colspan="1" rowspan="2" scope="row">
                                <ul>
                                    <li>菜品简介</li>
                                </ul>
                            </th>
                            <td>{{$food->intro}}<br></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <hr style=" height:2px;border:none;border-top:2px dotted #185598;" />
        </div>

        {{--<h2><a href="{{ url('/foods',$food->name) }}"><img src="{{$food->img}}"/></a></h2>--}}
        {{--<h2><a href="{{ url('/foods',$food->name) }}">{{$food->name}}</a></h2>--}}
        {{--<p>{{$food->intro}}<br></p>--}}
    @endforeach
    <div class="container" style="text-align: right">
        <a href="{{ url('/foods/create') }}">+添加新食材</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ url('/users/profile') }}">返回个人中心</a>
    </div>
@endsection