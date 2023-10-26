<h1>Edit car #{{ $car->id }}</h1>
<form method="POST" action="/cars/{{ $car->id }}">
    @method('PUT')
    @csrf    
    <div>
        <p>Manufacturer</p>
        <input name="manufacturer" value="{{ old('manufacturer') ?? $car->manufacturer }}">
    </div>
    <div>
        <p>Model</p>
        <input name="model" value="{{ old('model') ?? $car->model }}">
    </div>
    <div>
        <p>Price</p>
        <input name="price" value="{{ old('price') ?? $car->price }}">
    </div>
    <button>Edit car</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif