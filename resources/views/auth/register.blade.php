@extends('index')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form action="{{Route('auth.register')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="email_address" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input type="text" id="email_address" class="form-control" name="name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="text" id="email_address" class="form-control" name="email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                            <input type="password" id="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Password
                            Confirmation</label>
                        <div class="col-md-6">
                            <input type="password" id="password_confirmation" class="form-control"
                                name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection