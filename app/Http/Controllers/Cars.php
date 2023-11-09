<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cars\Store as StoreRequest;
use App\Http\Requests\Cars\Update as UpdateRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class Cars extends Controller
{
    public function index()
    {
        $cars = Car::orderByDesc('created_at')->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $transmissions = config('car.transmission');
        return view('cars.create', compact('transmissions'));
    }

    public function store(StoreRequest $request)
    {
        $fields = $request->validated();
        $car = Car::create($fields);
        return redirect()->route('cars.show', $car->id);
    }

    public function show(Car $car)
    {
        $key_transmission  = $car['transmission'];
        $car['transmission'] = config('car.transmission.' . $key_transmission);
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        $transmissions = config('car.transmission');
        return view('cars.edit', compact('car', 'transmissions'));
    }

    public function update(UpdateRequest $request, Car $car)
    {
        $fields = $request->validated();
        $car->update($fields);
        return redirect()->route('cars.show', $car->id);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
