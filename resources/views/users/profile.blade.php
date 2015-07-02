@extends('layouts.usermaster')
@section('content')

    <h1>个人信息</h1>
    <hr>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <h4><a href="{{ url('/users/moreinfo') }}">{{ '修改资料'}}</a></h4>
                    </tr>
                    <hr>
                    <tr>
                        <h4><a href="{{ url('/users/dishes') }}">{{ '我的菜谱'}}</a></h4>
                    </tr>
                    <hr>
                    <tr>
                        <h4><a href="{{ url('/users/favdishes') }}">{{ '我收藏的菜谱'}}</a></h4>
                    </tr>
                    <hr>
                    <tr>
                        <h4><a href="{{ url('/users/favfoods') }}">{{ '我收藏的食材'}}</a></h4>
                    </tr>
                    </tbody>




                </table>
            </div>
            <div class="span6">
                <table class="table table-hover">
                    <tbody>

                    <tr>
                        <td>用户名</td>
                        <td> {{$user->username}}</td>
                    </tr>
                    <tr>
                        <td>邮箱</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>性别</td>
                        <td> {{$user->sex}}</td>
                    </tr>
                    <tr>
                        <td>年龄</td>
                        <td> {{$user->age}}</td>
                    </tr>
                    <tr>
                        <td>出生日期</td>
                        <td> {{$user->birthday}}</td>
                    </tr>
                    <tr>
                        <td>常住地</td>
                        <td>{{$user->place}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


{{--<h1>个人信息</h1>--}}
    {{--<li>用户名： {{$user->username}}</li>--}}
    {{--<li>邮箱： {{$user->email}}</li>--}}
    {{--<li>性别： {{$user->sex}}</li>--}}
    {{--<li>年龄： {{$user->age}}</li>--}}
    {{--<li>出生日期： {{$user->birthday}}</li>--}}
    {{--<li>常住地： {{$user->place}}</li>--}}

    {{--<h4><a href="{{ url('/users/moreinfo') }}">{{ '修改资料'}}</a></h4>--}}
    {{--<h4><a href="{{ url('/users/dishes') }}">{{ '我的菜谱'}}</a></h4>--}}
    {{--<h4><a href="{{ url('/users/favdishes') }}">{{ '我收藏的菜谱'}}</a></h4>--}}
    {{--<h4><a href="{{ url('/users/favfoods') }}">{{ '我收藏的食材'}}</a></h4>--}}
@endsection