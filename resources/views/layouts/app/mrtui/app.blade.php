<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ env('APP_NAME') }}
    </title>

    @include('layouts.app.mrtui.head')
</head>

<body>
    <section id="admin">
        @include('layouts.app.mrtui.sidebar')
        <section id="main-admin">
            @include('layouts.app.mrtui.navbar')
            @yield('contents')
            @include('layouts.app.mrtui.footer')
        </section>
    </section>

    @include('layouts.app.mrtui.scripts')
</body>

</html>
