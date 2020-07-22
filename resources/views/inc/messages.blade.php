@if(count($errors) > 0)
<ul class="alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif

@if(session()->has('msg'))
<div class="row">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Notification </strong>{{session()->get('msg')}}
    </div>
</div>
@endif

@if(session()->has('err'))
<div class="row">
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Notification </strong>{{session()->get('err')}}
    </div>
</div>
@endif