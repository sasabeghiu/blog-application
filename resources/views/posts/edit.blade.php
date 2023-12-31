@extends('layouts.app')

@section('content')
    <h1>Edit a Post</h1>
    {!! Form::open([
        'action' => ['App\Http\Controllers\PostsController@update', $post->id],
        'method' => 'POST',
        'enctype' => 'multipart/form-data',
    ]) !!}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', $post->body, ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
    </div>

    <div class="form-group mt-1">
        {{ Form::file('cover_image') }}
    </div>
    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Submit', ['class' => 'btn btn-primary mt-2']) }}
    {!! Form::close() !!}
@endsection
