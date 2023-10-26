<h1>Add new car</h1>
<form method="POST" action="/cars">
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
@endif