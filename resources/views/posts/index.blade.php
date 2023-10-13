@extends('layouts.app')

@section('content')
    <h3>Posts</h3>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card bg-secondary p-3 mb-3">
                <h3><a href="/posts/{{ $post->id }}" class="text-decoration-none">{{ $post->title }}</a></h3>
                <small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No posts found.</p>
    @endif
@endsection
