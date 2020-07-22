@extends('index')
@section('content')
<div class="mt-5">
    <h1>{{$post->title}}</h1>
    <img class="mt-2 mb-5 offset-2" src="{{$post->image}}" alt="">
    <div class="mb-5">
        {!! $post->description !!}
    </div>
    <a href="{{url()->previous()}}" class="mb-5 btn btn-info">
        back
    </a>
</div>
@endsection