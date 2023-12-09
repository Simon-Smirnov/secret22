@extends('components.layout.newmain')

@section('title', 'Cars trash')

@section('h1', 'Cars trash')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
    @foreach($trash as $car)
        <ul>
            <li class="">
                <h4>{{ $car->model }}</h4>
                <x-form action="{{ route('cars.restore', $car->id) }}" method="put">
                    <x-form-input type="hidden" name="vin" value="{{ $car->vin }}" />
                    <x-form-input type="hidden" name="id" value="{{ $car->id }}" />
                    <button>Restore car</button>
                </x-form>
            </li>
        </ul>
    @endforeach
@endsection