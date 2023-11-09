<x-layout.main title="Add new car">
<x-form action="{{ route('cars.store') }}">
    @include('cars.form')
</x-form> 
<!-- <form method="POST" action="{{ route('cars.store') }}">
    @csrf    
    <div>
        <p>Manufacturer</p>
        <input name="manufacturer" value="{{ old('manufacturer') }}">
    </div>
    <div>
        <p>Model</p>
        <input name="model" value="{{ old('model') }}">
    </div>
    <div>
        <p>Price</p>
        <input name="price" value="{{ old('price') }}">
    </div>
    <div>
        <p>Transmission</p>
        <x-select name="transmission" :options="$transmissions"></x-select>
        @error('transmission')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <button>Add</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
</x-layout.main>