@extends('layouts.app')

@section('content')
    <div class="bg-secondary text-center p-5">
        <h1>{{ $title }}</h1>
        <p>This is the Laravel application from "Laravel from scratch" course.</p>
        <p>
            <a href="/login" class="btn btn-primary btn-lg" role="button">Login</a>
            <a href="/register" class="btn btn-success btn-lg" role="button">Register</a>
        </p>
    </div>
@endsection