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
                <th></th>
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
                        {{$user->sex}}
                    </td>
                    <td>
                        {{$user->age}}
                    </td>
                    <td>
                        {{$user->place}}
                    </td>
                    <td>
                        {{$user->created_at}}
                    </td>
                    <td>
                        {{$user->id}}
                    </td>


                </tr>
            @endforeach
        </table>
    </div>


@endsection