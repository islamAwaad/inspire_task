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
            <a href="{{Route('admin.page.create.page')}}" class="btn btn-success float-right">Create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Page Name</th>

                        <th style="width:10%">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                    <tr>
                        <td>{{$page->id}}.</td>
                        <td>{{$page->name}}</td>

                        <td>
                            <a href="{{ Route('admin.page.show', $page->id) }}" class="btn btn-info">edit</a>
                            <form style="display:inline" action="{{Route('admin.page.delete')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="page_id" value="{{$page->id}}">
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
                {{$pages->links()}}
            </div>
        </div>
    </div>

</div>
@endsection