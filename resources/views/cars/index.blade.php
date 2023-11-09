<h1>All cars</h1>

<hr>
<a href="{{ route('cars.create') }}">Add new car</a>
<hr>

@foreach($cars as $car)
    <ul>
        <li class="">
            <span>{{ $car->model }}</span>
            <a href="{{ route('cars.show', $car->id) }}">Read more...</a>
        </li>
    </ul>
@endforeach