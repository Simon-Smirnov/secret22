<h1>All cars</h1>

<hr>
<a href="/cars/create">Add new car</a>
<hr>

@foreach($cars as $car)
    <ul>
        <li>
            <span>{{ $car->model }}</span>
            <a href="/cars/{{ $car->id }}">Read more...</a>
        </li>
    </ul>
    
@endforeach