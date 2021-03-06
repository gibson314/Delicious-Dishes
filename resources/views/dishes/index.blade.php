@extends ('layouts.dishmaster')

@section('content')
    <h2>菜单列表</h2>
        <hr>
    <a href="{{url('/dishes/create')}}">创建新菜谱</a>
        @foreach ($dishes as $dish)
            <div class="Empty">
                <p></br></p>
            </div>

            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span4">
                        <a href="{{ url('/dishes',$dish->id) }}"><img style="vertical-align:middle;" src="{{$dish->TitleImg}}"/></a>
                    </div>
                    <div class="span8">
                        <table valign="middle"  align="left" class="table table-hover" contenteditable="false">
                            <tbody>
                            <tr>
                                <th scope="row" width="25%">
                                    <ul>
                                        <li>菜品名称</li>
                                    </ul>
                                </th>
                                <td><a href="{{ url('/dishes',$dish->id) }}">{{$dish->name}}</a></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <ul>
                                        <li>上传用户</li>
                                    </ul>
                                </th>
                                <?php $author=\App\User::where('id',$dish->authorid)->first();?>
                                <td><a href="{{ url('author',$dish->authorid) }}">{{$author->username}}</a> </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <ul>
                                        <li>上传时间</li>
                                    </ul>
                                </th>
                                <td>发表于{{$dish->publish_date}}<br></td>
                            </tr>
                            <tr>
                                <th colspan="1" rowspan="2" scope="row">
                                    <ul>
                                        <li>菜品简介</li>
                                    </ul>
                                </th>
                                <td>{{$dish->intro}}<br></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <hr style=" height:2px;border:none;border-top:2px dotted #185598;" />
            </div>
            {{--<h2><a href="{{ url('/dishes',$dish->id) }}"><img src="{{$dish->TitleImg}}"/></a></h2>--}}

        @endforeach
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="pagination pagination-centered pagination-large">
                        <?php echo($dishes->render())?>
                    </div>
                </div>
            </div>
        </div>
@endsection