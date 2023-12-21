<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\Save as SaveRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class Posts extends Controller
{

    public function __construct() {
        $this->authorizeResource(Post::class);
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(SaveRequest $request)
    {
        $post = Post::make($request->validated());
        $post->user_id = auth()->id();
        $post->save();
        return redirect()->route('posts.show', $post->id);
    }

    public function show(Post $post /*string $id*/)
    {
        //$post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post /*string $id*/)
    {
       // $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(SaveRequest $request, Post $post /*string $id*/)
    {
        //$post = Post::findOrFail($id);
        $post->update($request->validated());
        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete($post);
        return redirect()->route('posts.index');
    }
}
