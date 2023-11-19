@extends('components.layout.newmain')

@section('title', 'Edit brand')

@section('h1', "Edit brand")

@section('menu')
    <ul>
        <li><a href="{{ route('brands.index') }}">All brand</a></li>
        <li><a href="{{ route('brands.create') }}">Add new brand</a></li>
    </ul>
@endsection

@section('content')
    @bind($brand)
        <x-form action="{{ route('brands.update', $brand->id) }}" method="put">
            @include('brands.form')
        </x-form>
    @endbind
@endsection