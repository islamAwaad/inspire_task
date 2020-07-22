@extends('index')
@section('content')
<div class="mt-5">
    <div>
        <h1 style="display:inline">{{$post->title}}</h1>
        <p class="float-right">Created At {{$post->created_at}}</p>
    </div>
    <img class="mt-2 mb-5 offset-2" src="{{$post->image}}" alt="">
    <div class="mb-5">
        {!! $post->description !!}
    </div>
    <div>
        <p class="float-right">Created By
            @if(Auth()->guest())
            {{$post->user->name}}
            @else
            {{Auth()->user()->id == $post->user->id ? 'me': $post->user->name}}
            @endif
        </p>
    </div>
    <a href="{{url()->previous()}}" class="mb-5 btn btn-info">
        back
    </a>
</div>
@endsection