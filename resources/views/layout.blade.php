<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <link href="index.blade.css" type="text/css" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="{{ asset('js/index.js') }}"></script>
</head>
<body>
    <header>
        @include('header')
    </header>
        @yield('contents')
    <footer>
        @include('footer')
    </footer>
</body>
</html>
