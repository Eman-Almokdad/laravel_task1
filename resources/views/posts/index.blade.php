@extends('layouts.app')
@section("title" , "posts")
@section("content")

<div class="container mt-5">
    <a href="{{ route("posts.create") }}" class="btn btn-secondary mb-3">add new post</a>
@forelse ($posts as $post )
    <div class="crud">
        <img src="/images/posts/{{ $post ->image }}" alt="">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->description }}</p>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ $post->show }}">show</a>
    </div>
@empty
    <h1>there isn't any posts</h1>
@endforelse
</div>
@endsection
