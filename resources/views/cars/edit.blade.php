@extends('components.layout.newmain')

@section('title', 'Edit car')

@section('h1', "Edit car")

@section('menu')
    <ul>
        <li><a href="{{ route('cars.index') }}">All cars</a></li>
        <li><a href="{{ route('cars.create') }}">Add new car</a></li>
        <li><a href="{{ route('cars.trash.index') }}">Car's trash</a></li>
    </ul>
@endsection

@section('content')

    <x-form action="{{ route('cars.update', $car->id) }}" method="put">
        @bind($car)
            @include('cars.form')
        @endbind
    </x-form>

@endsection