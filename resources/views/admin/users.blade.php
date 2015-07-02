@extends('layouts.master')
@section('content')

    @foreach($users as $user)
        {{$user->id}}<br/>
        {{$user->username}}<br/>
        {{$user->email}}<br/>
        {{$user->sex}}<br/>
        {{$user->age}}<br/>
        {{$user->birthday}}<br/>
        {{$user->place}}<br/>
        {{$user->created_at}}<br/>
        {{$user->updated_at}}<br/>
    @endforeach


@endsection