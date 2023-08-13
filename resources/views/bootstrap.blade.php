<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/tabler-flags.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/tabler-payments.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/tabler-vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
</head>

<body>
    <x-guest-layout>
        @yield('body')
    </x-guest-layout>
    <script src="" {{ asset('dist/js/tabler.min.js') }}></script>
    <script src="" {{ asset('dist/js/demo.min.js') }}></script>
</body>

</html>
