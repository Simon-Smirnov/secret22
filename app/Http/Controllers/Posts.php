<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Posts extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:30',
            'content' => 'required|min:5|max:60'
        ]);
        $fields = $request->all($validated);
        $post = Post::create($fields);
        return redirect("/posts/{$post->id}");
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|min:2|max:30',
            'content' => 'required|min:5|max:120',
        ]);
        $post->update($validated);
        return redirect("/posts/{$post->id}");
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete($post);
        return redirect("/posts");
    }
}
