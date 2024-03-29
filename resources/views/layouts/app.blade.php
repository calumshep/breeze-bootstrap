<!doctype html>
<html lang="en"> <!--lang="{{ str_replace('_', '-', app()->getLocale()) }}"-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/js/app.js'])

        @yield('head')
    </head>

    <body>
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="container">
            @yield('content')
        </main>
    </body>
</html>
