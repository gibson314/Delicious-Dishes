@extends ('layouts.master')

@section('content')
    <h2>查询结果</h2>
    <ol>
    @foreach ($authors as $author)
        <li\><p><a href="{{ url('author',$author->id) }}">{{$author->username}}</a><br></p>
    @endforeach
    </ol>
@endsection