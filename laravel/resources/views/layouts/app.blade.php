<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title', 'Base Laravel')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        
        <x-header :homePage="!request()->is('signup*')"/>

        <main>
            @yield('content')
        </main>

    </body>
</html>