@extends('layouts.master')

@section('content')

<h1>About us</h1>

<form action="{{ URL('admin/pages') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="title" class="form-control" required="required">
    <br>
    <textarea name="body" rows="10" class="form-control" required="required"></textarea>
    <br>
    <button class="btn btn-lg btn-info">新增 Page</button>
</form>

@endsection

