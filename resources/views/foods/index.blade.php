@extends ('layouts.foodmaster')

@section('content')
    @foreach ($foods as $food)
        <div class="Empty">
            <p></br></p>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span4">
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
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="pagination pagination-centered pagination-large">
                    <?php echo($foods->render())?>
                </div>
            </div>
        </div>
    </div>

@endsection