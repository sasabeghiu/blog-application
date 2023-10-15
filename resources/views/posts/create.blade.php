@extends('layouts.app')

@section('content')
    <h1>Create a Post</h1>
    {!! Form::open([
        'action' => 'App\Http\Controllers\PostsController@store',
        'method' => 'POST',
        'enctype' => 'multipart/form-data'
    ]) !!}
    <div class="form-group mt-1">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>

    <div class="form-group mt-1">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
    </div>

    <div class="form-group mt-1">
        {{ Form::file('cover_image') }}
    </div>
    {{ Form::submit('Submit', ['class' => 'btn btn-primary mt-2']) }}
    {!! Form::close() !!}
@endsection
