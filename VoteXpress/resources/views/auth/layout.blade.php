<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo.png') }}" type="image/x-icon">
    <title>@yield('title', 'titre')</title>
    @vite(['resources/css/index.css', 'resources/css/app.css'])
    @yield('style')
</head>

<body>
    <div class="contain">
        <div class="photo-circle">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo">
        </div>
        @yield('content')
    </div>
    @yield('scripts')
    @vite(['resources/js/app.js'])
</body>

</html>