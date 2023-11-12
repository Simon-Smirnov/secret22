@extends('components.layout.newmain')

@section('title', 'Car')

@section('h1', "Car")

@section('menu')
    <ul>
        <li><a href="{{ route('cars.index') }}">All cars</a></li>
        <li><a href="{{ route('cars.create') }}">Add new car</a></li>
        <li><a href="{{ route('cars.trash.index') }}">Car's trash</a></li>
    </ul>
@endsection

@section('content')

    <div>
        <div>Manufacturer: {{ $car->manufacturer }}</div>
        <div>Model: {{ $car->model }}</div>
        <div>Price: {{ $car->price }}</div>
        <div>Transmission: {{ $car->transmission }}</div>
        <div>VIN: {{ $car->vin }}</div>
    </div>
    <hr>
    <a href="{{ route('cars.edit', $car->id) }}">Edit car</a>
    <hr>
    <form method="POST" action="{{ route('cars.destroy', $car->id) }}">
        @method('DELETE')
        @csrf
        <button>Delete car</button>
    <form>

@endsection