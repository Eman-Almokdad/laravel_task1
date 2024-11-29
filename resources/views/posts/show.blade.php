@extends("layouts.app")
@section("title" , "post")
@section("content")
<h1>title :{{ $post->title }}</h1>
<p>description :{{ $post->description }}</p>
<img src="/images/posts/{{ $post->image }}" alt="">
<p>added at :{{ $post->created_at }}</p>
<a href="{{ route("posts.index") }}">back</a>
@endsection