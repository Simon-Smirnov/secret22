<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cars\Store as StoreRequest;
use App\Http\Requests\Cars\Update as UpdateRequest;
use App\Http\Requests\Cars\Restore as RestoreRequest;
use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;

class Cars extends Controller
{
    public function index()
    {
        $cars = Car::with('brand.country')->orderByDesc('created_at')->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $transmissions = config('car.transmission');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        return view('cars.create', compact('transmissions', 'brands'));
    }

    public function store(StoreRequest $request)
    {
        $fields = $request->validated();
        $car = Car::create($fields);
        $request->session()->flash('success', trans('notifications.cars.create'));
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
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        return view('cars.edit', compact('car', 'transmissions', 'brands'));
    }

    public function update(UpdateRequest $request, Car $car)
    {
        $fields = $request->validated();
        $car->update($fields);
        $request->session()->flash('success', trans('notifications.cars.edit'));
        return redirect()->route('cars.show', $car->id);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        //$request->session()->flash('success', trans('notifications.cars.delete'));
        return redirect()->route('cars.index');
    }

    public function trash()
    {
        $trash = Car::onlyTrashed()->orderByDesc('deleted_at')->get();
        return view('cars.trash', compact('trash'));
    }

    public function restore(RestoreRequest $request, string $id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        if(Car::where('vin', $car->vin)->exists()) {
            return redirect()->route('cars.trash.index')->with('alert', trans('notifications.cars.restore-fail-vin', ['vin' => $car->vin]));
        }
        dd('vin_2');
        $car ->restore();
        $request->session()->flash('success', trans('notifications.cars.restore'));
        return redirect()->route('cars.show', $car->id);
    }
}
