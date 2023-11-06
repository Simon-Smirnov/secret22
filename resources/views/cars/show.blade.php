<h1>Car №{{ $car->id }}</h1>
<div>
    <div>Manufacturer: {{ $car->manufacturer }}</div>
    <div>Model: {{ $car->model }}</div>
    <div>Price: {{ $car->price }}</div>
    <div>Transmission: {{ $car->transmission }}</div>
</div>
<hr>
<a href="{{ route('cars.edit', $car->id) }}">Edit car</a>
<hr>
<form method="POST" action="{{ route('cars.destroy', $car->id) }}">
    @method('DELETE')
    @csrf
    <button>Delete car</button>
<form>