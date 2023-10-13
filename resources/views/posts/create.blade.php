@extends('layouts.app')

@section('content')
    <h1>Create a Post</h1>
    <style>
        /* Adjust the CKEditor textarea size */
        #editor {
            min-height: 300px;
        }

        .ck.ck-content {
            min-height: 300px;
        }
    </style>
    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
    </div>
    {{ Form::submit('Submit', ['class' => 'btn btn-primary mt-2']) }}
    {!! Form::close() !!}
@endsection
