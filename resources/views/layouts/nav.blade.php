<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{Route('home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @if(!Auth::guest())
                    <li class="nav-item active">
                        <div class="dropdown">
                            <button class="btn btn-light" dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Posts
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{Route('post.user')}}">My Posts</a>
                                <a class="dropdown-item" href="{{Route('post.create.page')}}">Create Post</a>
                            </div>
                        </div>
                    </li>
                    @endif
                </ul>
                @if(Auth::guest())
                <div>
                    <a href="{{ Route('login.index')}}" class="btn btn-success">Login</a>
                    <a href="{{Route('register.index')}}" class="btn btn-primary ml-2">Register</a>
                </div>
                @else
                <div>
                    <form action="{{Route('auth.logout')}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </nav>