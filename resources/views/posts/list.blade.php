@extends('index')
@section('content')
<div class="col-md-10 mt-5 offset-1">
    @foreach($posts as $post)
    <div class="card mb-5">
        <h5 class="card-header">{{$post->title}}
            <form style="display:inline" action="{{Route('post.delete')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{$post->id}}" name="post_id">
                <button type="submit" class="float-right btn btn-danger">Delete</button>
            </form>
        </h5>
        <div class="card-body">
            <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">

            <div class="card-text">
                @if(strlen($post->description) > 400)
                {!! substr($post->description,0,600) . '...' !!}
                @else
                {!! $post->description !!}
                @endif
            </div>
            <a href="{{Route('post.show', $post->id)}}" class="btn btn-primary">Read More..</a>
        </div>
    </div>
    @endforeach
    <div class="offset-4 mb-5">
        {{ $posts->links() }}
    </div>
</div>
@endsection