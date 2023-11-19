@extends('components.layout.newmain')

@section('title', 'All brands')

@section('h1', 'All brands')

@section('menu')
    <ul>
        <li><a href="{{ route('brands.index') }}">All brands</a></li>
        <li><a href="{{ route('brands.create') }}">Add new brand</a></li>
    </ul>
@endsection

@section('content')
    @if($brands->isEmpty())
        <div class="alert alert-info">
            There are no brands. Please create one.
        </div>
    @else
        @foreach($brands as $brand)
            <ul>
                <li class="">
                    <span>{{ $brand->title }}</span>
                    <a href="{{ route('brands.show', $brand->id) }}">Read more...</a>
                </li>
            </ul>
        @endforeach
    @endif
@endsection

