<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Base Laravel')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        
        @include('partials.header')

        <main>
            @yield('content')
        </main>

    </body>
</html>