@extends ('layouts.master')

@section('content')
    <h2>查询结果</h2>
    @foreach ($dishes as $dish)
        <h2><a href="{{ url('/dishes',$dish->id) }}"><img src="{{$dish->TitleImg}}"/></a></h2>
        <h2><a href="{{ url('/dishes',$dish->id) }}">{{$dish->name}}</a></h2>
        <?php $author=\App\User::where('id',$dish->authorid)->first();?>
        <p><a href="{{ url('author',$dish->authorid) }}">{{$author->username}}</a> 发表于{{$dish->publish_date}}<br></p>
        <p>{{$dish->intro}}<br></p>
    @endforeach
@endsection