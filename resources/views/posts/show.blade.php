@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-secondary">Go Back</a>
    <h1>{{ $post->title }}</h1>
    <div>
        {!! $post->body !!}
    </div>
    <hr>
    <small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <div class="row">
                <div class="col">
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                </div>
                <div class="col-sm-1">
                    {!! Form::open([
                        'action' => ['App\Http\Controllers\PostsController@destroy', $post->id],
                        'method' => 'POST',
                    ]) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        @endif
    @endif
@endsection
