@extends('dashboard.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Post</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @include('inc.messages')
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Post</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{Route('admin.post.update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}"
                            id="exampleInputName" placeholder="Enter Name">
                    </div>
                    <img src="{{$post->image}}" alt="">
                    <input type="hidden" value="{{$post->id}}" name="post_id">
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="img" id="exampleInputFile">
                            </div>
                        </div>
                    </div>
                    <textarea id="mytextarea" name="description">{!!$post->description!!} </textarea>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Upadte</button>
                </div>
            </form>
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