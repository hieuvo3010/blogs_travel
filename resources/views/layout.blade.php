<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blogs Travek</title>

        <link rel="stylesheet" type='text/css' href="{{ asset('css/app.css')}}">
        <link rel="stylesheet" type='text/css' href="{{ asset('css/style.css')}}">
    </head>
    <body>
        <div class="container-fluid">
            @include('pages.header')
            @include('pages.navbar')
            @yield('content')
        </div class="container footer">
            <p>this is footer</p>
        <div>

        </div>

        <script  type='text/javascript' src="{{ asset('js/app.js')}}"></script>
        
    </body>
</html>
