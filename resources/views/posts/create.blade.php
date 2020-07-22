@extends('index')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Create Post</div>
            <div class="card-body">
                @include('inc.messages')
                <form action="{{Route('post.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" placeholder="Add post title" id="title" class="form-control"
                                name="title">
                        </div>
                    </div>

                    <div class="custom-file mb-4">
                        <div class="col-md-12">
                            <input type="file" name="img">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea placeholder="Add post description" id="description" class="form-control"
                                name="description"></textarea>
                        </div>
                    </div>
                    <!-- <textarea id="mytextarea" name="description"></textarea> -->
                    <div class="col-md-6  mt-4">
                        <button type="submit" class="btn btn-primary float-left">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
tinymce.init({
    selector: '#mytextarea',
    plugins: 'link'
});
</script>
@endsection