@extends ('layouts.master')

@section('content')
    <h2>查询结果</h2>
    @foreach ($foods as $food)
        <h2><a href="{{ url('/foods',$food->name) }}"><img src="{{$food->img}}"/></a></h2>
        <h2><a href="{{ url('/foods',$food->name) }}">{{$food->name}}</a></h2>
        <p>{{$food->intro}}<br></p>
    @endforeach
@endsection