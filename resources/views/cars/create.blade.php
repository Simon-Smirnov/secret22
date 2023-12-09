@extends('components.layout.newmain')

@section('title', 'Create car')

@section('h1', "Create car")

@section('menu')
    @include('components.menu')
@endsection

@section('content')

    <x-form action="{{ route('cars.store') }}">
        @include('cars.form')
    </x-form>

@endsection