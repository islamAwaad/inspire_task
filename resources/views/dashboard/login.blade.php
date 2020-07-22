<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-4">
            <div class="card">
                @include('inc.messages')
                <div class="card-body">
                    <form action="{{Route('admin.login')}}" method="POST" autocomplete="off">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>