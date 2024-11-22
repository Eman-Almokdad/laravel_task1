<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("posts.index" , compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request ->hasFile("image")) {
            $imageName =$request->file("image")->getClientOriginalName() . "-" . time() . $request->file("image")->getClientOriginalExtension();
            $request->file("image")->move(public_path("/images/posts"),$imageName);
        }
        Post::create([
            "title"=> $request->title,
            "description"=>$request->description,
            "image"=>$imageName
        ]);
        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);
    
        if ($request->hasFile("image")) {
            
            if ($post->image) {
                Storage::delete("public/posts/" . $post->image);
            }
            
            $imageName = $request->file("image")->store("posts", "public");
            $post->image = $imageName;
        }
    
        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $post->image,
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image && file_exists(public_path('images/posts/' . $post->image))) {
            unlink(public_path('images/posts/' . $post->image));
        }
        $post->delete(); 
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
