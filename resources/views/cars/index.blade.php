@extends('components.layout.newmain')

@section('title', 'All cars')

@section('h1', 'All cars')

@section('menu')
    <ul>
        <li><a href="{{ route('cars.index') }}">All cars</a></li>
        <li><a href="{{ route('cars.create') }}">Add new car</a></li>
        <li><a href="{{ route('cars.trash.index') }}">Car's trash</a></li>
    </ul>
@endsection

@section('content')
    @foreach($cars as $car)
        <ul>
            <li class="">
                <span>{{ $car->model }}</span>
                <a href="{{ route('cars.show', $car->id) }}">Read more...</a>
            </li>
        </ul>
    @endforeach
@endsection

