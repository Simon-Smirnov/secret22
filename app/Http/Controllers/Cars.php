<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class Cars extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'manufacturer' => 'required|min:2|max:64',
            'model' => 'required|min:2|max:64',
            'price' => 'required|integer|max:990000000|multiple_of:1000',
        ]);
        $car = Car::create($validated);
        return redirect()->route('cars.show', $car->id);
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'manufacturer' => 'required|min:2|max:64',
            'model' => 'required|min:2|max:64',
            'price' => 'required|integer|max:990000000|multiple_of:1000',
        ]);
        $car->update($validated);
        return redirect()->route('cars.show', $car->id);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
