@extends('components.layout.newmain')

@section('title', 'Create car')

@section('h1', "Create car")

@section('menu')
    <ul>
        <li><a href="{{ route('cars.index') }}">All cars</a></li>
        <li><a href="{{ route('cars.create') }}">Add new car</a></li>
        <li><a href="{{ route('cars.trash.index') }}">Car's trash</a></li>
    </ul>
@endsection

@section('content')

    <x-form action="{{ route('cars.store') }}">
        @include('cars.form')
    </x-form>

@endsection