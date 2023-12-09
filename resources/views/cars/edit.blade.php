@extends('components.layout.newmain')

@section('title', 'Edit car')

@section('h1', "Edit car")

@section('menu')
    @include('components.menu')
@endsection

@section('content')

    <x-form action="{{ route('cars.update', $car->id) }}" method="put">
        @bind($car)
            @include('cars.form')
        @endbind
    </x-form>

@endsection