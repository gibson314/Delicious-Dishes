@extends ('layouts.master')

@section('content')
    @foreach ($foods as $food)
        <h2><a href="{{ url('/foods',$food->name) }}"><img src="{{$food->img}}"/></a></h2>
        <h2><a href="{{ url('/foods',$food->name) }}">{{$food->name}}</a></h2>
        <p>{{$food->intro}}<br></p>
        {!! link_to_route('foods.edit', '编辑', $food->name) !!}
        {!! link_to_route('foods.destory', '删除', $food->name) !!}
    @endforeach
    <?php echo($foods->render())?>
@endsection