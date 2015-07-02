@extends('layouts.usermaster')
@section('content')

    {{--@foreach($users as $user)--}}
        {{--{{$user->id}}<br/>--}}
        {{--{{$user->username}}<br/>--}}
        {{--{{$user->email}}<br/>--}}
        {{--{{$user->sex}}<br/>--}}
        {{--{{$user->age}}<br/>--}}
        {{--{{$user->birthday}}<br/>--}}
        {{--{{$user->place}}<br/>--}}
        {{--{{$user->created_at}}<br/>--}}
        {{--{{$user->updated_at}}<br/>--}}
    {{--@endforeach--}}
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>用户编号</th>
                <th>用户名</th>
                <th>邮箱</th>
                <th>注册时间</th>
                <th>权限</th>
                <th>操作</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>
                        {{$user->id}}
                    </td>
                    <td>
                        {{$user->username}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->created_at}}
                    </td>
                    <form action="{{URL('users/changepri')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <td>
                            <select name="privilege">
                                @if ($user->privilege == 1)
                                <option value=1  selected="selected">User</option>
                                <option value=2 >Elite User</option>
                                <option value=3>Sub Admin</option>
                                <option value=4>Administrator</option>
                                    @elseif ($user->privilege == 2)
                                    <option value=1 >User</option>
                                    <option value=2 selected="selected">Elite User</option>
                                    <option value=3>Sub Admin</option>
                                    <option value=4>Administrator</option>
                                @elseif($user->privilege == 3)
                                    <option value=1 >User</option>
                                    <option value=2 >Elite User</option>
                                    <option value=3 selected="selected">Sub Admin</option>
                                    <option value=4>Administrator</option>
                                @elseif($user->privilege == 4)
                                    <option value=1 >User</option>
                                    <option value=2>Elite User</option>
                                    <option value=3>Sub Admin</option>
                                    <option value=4 selected="selected">Administrator</option>
                                @else
                                    <option value=1 >User</option>
                                    <option value=2>Elite User</option>
                                    <option value=3>Sub Admin</option>
                                    <option value=4>Administrator</option>
                                @endif
                            </select>

                    </td>
                    <td>
                        {{--{!! Form::open(--}}
                            {{--['action' => ['UsersController@postRemove', $user->id],--}}
                                            {{--'method' => 'POST',--}}
                                            {{--'style' => 'display: inline;'--}}
                            {{--])--}}
                        {{--!!}--}}
                        {{--<button type="button" class="btn btn-primar" id="delete{{ $user->id }}">--}}
                            {{--<span class="am-icon-remove"></span>--}}
                            {{--Delete--}}
                        {{--</button>--}}
                        {{--{!! Form::close() !!}--}}
                        <input type="hidden" name="priid" value="{{$user->id}}">
                        <button class="btn btn-sm btn-info">提交修改</button>

                        {{--<form action="{{ URL('dishes/del') }}" method="POST">--}}
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                            {{--<input type="hidden" name="delid" value="{{$dish->id}}">--}}
                            {{--<button class="btn btn-sm btn-info">删除</button>--}}
                        {{--</form>--}}
                    </td>

                    </form>
                    <td>
                        <form action="{{URL('users/del')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="delid" value="{{$user->id}}">
                            <button class="btn btn-sm btn-info">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="pagination pagination-centered pagination-large">
                    <?php echo($users->render())?>
                </div>
            </div>
        </div>
    </div>


@endsection