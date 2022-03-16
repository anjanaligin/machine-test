@extends('layouts.app');
@section('content')
<a href="/">View all articles</a>
<h1>{{$data->title}}</h1>
<p>{{$data->description}}</p>
<p><img class="img-thumbnail" style="width:450px height: 300px;" src="{{url('/images/'.$data->image)}}" alt="Image"/>{{$data->image}}</p>


@endsection