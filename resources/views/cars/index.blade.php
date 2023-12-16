@extends('components.layout.newmain')

@section('title', 'All cars')

@section('h1', 'All cars')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
    @foreach($cars as $car)
        <ul>
            <!-- <img src="{{ asset('storage/node_modules/@mdi/svg/svg/abacus.svg') }}" alt="Your SVG">
            <img src="/node_modules/airbag.svg" alt="Your SVG">
            <img src="{{ base_path('node_modules/airbag.svg') }}"> -->
            <icon ggg name="abacus"> 33 44
            <li class="">
                <em>{{ $car->brand->country->title }}</em>
                <span>{{ $car->brand->title }} {{ $car->model }}</span>
                <a href="{{ route('cars.show', $car->id) }}">Read more...</a>
            </li>
        </ul>
    @endforeach
@endsection

