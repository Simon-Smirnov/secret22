@extends('components.layout.newmain')

@section('title', 'Login')

@section('h1', "Login")

@section('menu')
    @include('components.menu')
@endsection

@section('content')

    <x-form action="{{ route('auth.session.store') }}" method="post">
        @include('auth.sessions.form')
    </x-form>

@endsection