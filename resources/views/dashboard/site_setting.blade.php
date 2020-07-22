@extends('dashboard.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @include('inc.messages')
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Site Settings</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{Route('admin.setting.update')}}" method="post">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label>Site Name</label>
                        <input type="text" name="site_name" value="{{$setting ? $setting->site_name: ''}}"
                            class="form-control" placeholder="Enter Site Name">
                    </div>
                    <div class="form-group">
                        <label>Menu Home</label>
                        <input type="text" name="menu_home" value="{{$setting ? $setting->menu_home: ''}}"
                            class="form-control" placeholder="Enter Menu Home Name">
                    </div>
                    <div class="form-group">
                        <label>Menu Posts</label>
                        <input type="text" name="menu_post" value="{{$setting ? $setting->menu_post: ''}}"
                            class="form-control" placeholder="Enter Menu Posts Name">
                    </div>
                    <div class="form-group">
                        <label>Menu Pages</label>
                        <input type="text" name="menu_pages" value="{{$setting ? $setting->menu_pages: ''}}"
                            class="form-control" placeholder="Enter Menu Pages Name">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection