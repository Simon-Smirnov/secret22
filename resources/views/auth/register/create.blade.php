@extends('components.layout.newmain')

@section('title', 'Check in')

@section('h1', "Check in")

@section('menu')
    @include('components.menu')
@endsection

@section('content')

    <x-form action="{{ route('auth.register.store') }}" method="post">
        @include('auth.register.form')
    </x-form>

@endsection