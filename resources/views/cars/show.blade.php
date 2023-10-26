<h1>Car №{{ $car->id }}</h1>
<div>
    <div>Manufacturer: {{ $car->manufacturer }}</div>
    <div>Model: {{ $car->model }}</div>
    <div>Price: {{ $car->price }}</div>
</div>
<hr>
<a href="/cars/{{ $car->id }}/edit">Edit car</a>
<hr>
<form method="POST" action="/cars/{{ $car->id }}">
    @method('DELETE')
    @csrf
    <button>Delete car</button>
<form>