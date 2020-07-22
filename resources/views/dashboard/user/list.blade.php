@extends('dashboard.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users List</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @include('inc.messages')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users</h3>
            <a href="{{Route('user.create.page')}}" class="btn btn-success float-right">Create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>name</th>
                        <th>email</th>
                        <th style="width:10%">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}.</td>
                        <td>{{$user->name}}</td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            <a href="{{Route('user.show', $user->id)}}" class="btn btn-info">edit</a>
                            <form style="display:inline" action="{{Route('user.delete')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="user_id" value="{{$user->id}}">
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
                {{$users->links()}}
            </div>
        </div>
    </div>

</div>
@endsection