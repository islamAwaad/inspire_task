@extends('dashboard.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pages List</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @include('inc.messages')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pages</h3>
            <!-- <a href="{{Route('admin.post.create.page')}}" class="btn btn-success float-right">Create</a> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width:10%">Image</th>
                        <th>Title</th>
                        <th style="width:10%">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}.</td>
                        <td><img src="{{$post->image}}" alt="" style="width:100%"></td>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            <a href="{{asset('/admin/post/show/' . $post->id)}}" class="btn btn-info">edit</a>
                            <form style="display:inline" action="{{Route('admin.post.delete')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="float-right">
                {{$posts->links()}}
            </div>
        </div>
    </div>

</div>
@endsection