<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class Todos extends Controller
{
    public function index()
    {
        //return Todo::with('user')->get();
        return Todo::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Todo $todo)
    {
        //
    }

    public function update(Request $request, Todo $todo)
    {
        //
    }

    public function destroy(Todo $todo)
    {
        //
    }
}
