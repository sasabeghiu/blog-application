@extends('layouts.app')

@section('content')
    <div class="bg-secondary text-center p-5">
        <h1>{{ $title }}</h1>
        <p>This is the Laravel application from "Laravel from scratch" course.</p>
        <p>
            This application is fully written in Laravel using Docker. The scope of this application is to implement the
            CRUD functionality on a Blog Application. You can register or log in as a user and create, update or delete a
            post made by you. You can also see the posts made by other users, wirhout being logged in.
        </p>
        <p>
            <a href="/login" class="btn btn-primary" role="button">Login</a>
            <a href="/register" class="btn btn-success" role="button">Register</a>
        </p>
    </div>
@endsection
