@extends("layouts.app")
@section("title" , "add post")
@section("content")
<h1>Add new post</h1>
<form action="{{ route("posts.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input class="form-control mb-3" type="text" name="title" placeholder="post title">
    <textarea class="form-control mb-3" name="description" placeholder="post description"></textarea>
    <input class="form-control mb-3" type="file" name="image" >
    <input class="btn btn-primary" mb-3 type="submit" value="send">
</form>
@endsection