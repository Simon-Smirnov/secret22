<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\Tags\Store as StoreRequest;
use Illuminate\Http\Request;

class Tags extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('title')->get();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(StoreRequest $request)
    {
        $tag = Tag::create($request->validated());
        return redirect()->route('tags.show', $tag->id);
    }

    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(StoreRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('tags.show', $tag->id);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index', $tag->id);
    }
}
