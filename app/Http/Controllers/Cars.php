<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cars\Store as StoreRequest;
use App\Http\Requests\Cars\Update as UpdateRequest;
use App\Http\Requests\Cars\Restore as RestoreRequest;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Enums\Cars\Status;

class Cars extends Controller
{
    public function index()
    {
        //$cars = Car::with('brand.country', 'tags')/*->where('status', Status::ACTIVE)*/->orderByDesc('created_at')->get();
        $cars = Car::active()->with('brand.country', 'tags')/*->where('status', Status::ACTIVE)*/->orderByDesc('created_at')->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        $transmissions = config('car.transmission');
        $tags = Tag::orderBy('title')->pluck('title', 'id');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $currentTags = [];
        return view('cars.create', compact('transmissions', 'brands', 'tags', 'currentTags'));
    }

    public function store(StoreRequest $request)
    {
        //$fields = $request->validated();
        //$tags = $fields['tags'];
        //unset($fields['tags']);
        //or alternate

        $data = collect($request->validated());
        $tags = $data->get('tags');
        $car = Car::make($data->except('tag_id')->toArray());
        DB::transaction(function () use($data, $car, $tags) {
            $car->save();
            $car->tags()->sync($tags);
        });
        $request->session()->flash('success', trans('notifications.cars.create'));
        return redirect()->route('cars.show', $car->id);
    }

    public function show(Car $car)
    {
        //dd($car->created_at->format('d.m.y'));
        //dd($car->status->toString());
        $key_transmission  = $car['transmission'];
        $car['transmission'] = config('car.transmission.' . $key_transmission);
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        $car->load('tags');
        $transmissions = config('car.transmission');
        $tags = Tag::orderBy('title')->pluck('title', 'id');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $currentTags = $car->tags->pluck('id')->toArray();
        return view('cars.edit', compact('car', 'transmissions', 'brands', 'tags'));
    }

    public function update(UpdateRequest $request, Car $car)
    {
        // $fields = $request->validated();
        // $tags = $fields['tags'];
        // unset($fields['tags']);
        //or alternate

        $data = collect($request->validated());
        $tags = $data->get('tags');
        DB::transaction(function () use($data, $car, $tags) {
            $car->update($data->except('tags')->toArray());
            $car->tags()->sync($tags);
        });
        $request->session()->flash('success', trans('notifications.cars.edit'));
        return redirect()->route('cars.show', $car->id);
    }

    public function destroy(Car $car)
    {
        if($car->deletable) {
            //$request->session()->flash('success', trans('notifications.cars.delete'));
            $car->delete();
            return redirect()->route('cars.index');
        }
        
        return redirect()->route('cars.show', $car->id)->with('alert', trans('notifications.cars.cant-delete'));
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
        $car ->restore();
        $request->session()->flash('success', trans('notifications.cars.restore'));
        return redirect()->route('cars.show', $car->id);
    }
}
