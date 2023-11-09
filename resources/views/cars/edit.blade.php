<h1>Edit car #{{ $car->id }}</h1>
<x-form action="{{ route('cars.update', $car->id) }}" method="put">
    @bind($car)
        @include('cars.form')
    @endbind
</x-form>
<!-- <form method="POST" action="{{ route('cars.update', $car->id) }}">
    @method('PUT')
    @csrf    
    <div>
        <p>Manufacturer</p>
        <input name="manufacturer" value="{{ $errors->any() ? old('manufacturer') : $car->manufacturer }}">
        @error('manufacturer')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <p>Model</p>
        <input name="model" value="{{ $errors->any() ? old('model') : $car->model }}">
        @error('model')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <p>Price</p>
        <input name="price" value="{{ $errors->any() ? old('price') : $car->price }}">
        @error('price')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <p>Transmission </p>
        <x-select name="transmission" :options="$transmissions" :currentoption="$car->transmission"></x-select>
        @error('transmission')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <button>Edit car</button>
</form> -->