@extends('index')
@section('content')
<div class="col-md-10 mt-5 offset-1">
    @include('inc.messages')
    @foreach($posts as $post)
    <div class="card mb-5">
        <h5 class="card-header">{{$post->title}}</h5>
        <div class="card-body">
            <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">

            <div class="card-text">
                {{ strlen($post->description) > 200 ? substr($post->description,0,200) . '...': $post->description }}
            </div>

            <a href="{{Route('post.show', $post->id)}}" class="btn btn-primary">Read More..</a>
            <div class="float-right">
                created by
                @if(Auth()->guest())
                {{$post->user->name}}
                @else
                {{Auth()->user()->id == $post->user->id ? 'me': $post->user->name}}
                @endif
            </div>
        </div>
    </div>
    @endforeach
    <div class="offset-4 mb-5">
        {{ $posts->links() }}
    </div>
</div>
@endsection