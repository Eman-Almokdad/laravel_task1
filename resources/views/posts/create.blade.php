@extends("layouts.app")
@section("title" , "add post")
@section("content")
<h1>Add new post</h1>
<form action="{{ route("posts.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="post title">
    <textarea name="description" placeholder="post description"></textarea>
    <input type="file" name="image" >
    <input type="submit" value="send">
</form>
@endsection