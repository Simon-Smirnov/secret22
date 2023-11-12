<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.scss'])
</head>
<body>
    <header>
        <div class="container border-bottom pb-2">
            logo
        </div>
    </header>
    <div>
        <div class="container">
            @if(session('success'))
                <p class="alert alert-info">
                    {{ session('success') }}
                </p>
            @endif
            <h1>@yield('h1')</h1>
            <div class="row">
                <div class="col-3">
                    @yield('menu')
                </div>
                <div class="col-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container border-top pt-2">
            footer
        </div>
    </footer>
    @vite(['resources/js/app.js'])
</body>
</html>