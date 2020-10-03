<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Publica_Laravel</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">

        @yield('content')

    </div>
</body>
</html>