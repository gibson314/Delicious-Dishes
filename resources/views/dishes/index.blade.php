@extends ('layouts.master')

@section('content')
        @foreach ($dishes as $dish)
            <h2><a href="{{ url('/dishes',$dish->id) }}"><img src="{{$dish->TitleImg}}"/></a></h2>
            <h2><a href="{{ url('/dishes',$dish->id) }}">{{$dish->name}}</a></h2>
            <p>{{$dish->author}}发表于{{$dish->publish_date}}<br></p>
            <p>{{$dish->intro}}<br></p>
        @endforeach
        {{$dishes->render()}}
@endsection