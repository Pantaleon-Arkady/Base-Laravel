<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <button class="btn btn-secondary">Test Button</button>
        <a href="/home" class="btn btn-primary">Home</a>
        <a href="/signup" class="btn btn-success">Signup</a>
    </body>
</html>