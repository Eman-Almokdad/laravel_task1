@extends('layouts.app')
@section("title" , "posts")
@section("content")
<a href="{{ route("posts.create") }}">add new post</a>
<div class="container">
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
    </div>
@empty
    <h1>there isn't any posts</h1>
@endforelse
</div>
@endsection