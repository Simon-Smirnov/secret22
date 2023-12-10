<ul>
    <li><a href="{{ route('cars.index') }}">All cars</a></li>
    @auth
        <li><a href="{{ route('cars.create') }}">Add new car</a></li>
        <li><a href="{{ route('cars.trash.index') }}">Car's trash</a></li>
        <li><a href="{{ route('tags.index') }}">All tags</a></li>
        <li><a href="{{ route('tags.create') }}">Create tag</a></li>
        <li><a href="{{ route('brands.index') }}">All brand</a></li>
        <li><a href="{{ route('brands.create') }}">Add new brand</a></li>
        <li><a href="{{ route('auth.session.logout') }}">Logout</a></li>
    @else
        <li><a href="{{ route('auth.session.login') }}">Login</a></li>
        <li><a href="{{ route('auth.register.form') }}">Register</a></li>
    @endif
</ul>