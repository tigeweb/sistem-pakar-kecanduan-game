<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ get_setting(\App\Enums\SettingEnum::LOGO_TITLE->value) }}
    </title>

    {{-- Bootstrap --}}
    <x-assets.bootstrap-head />
    <x-assets.bootstrap-icon />
    {{-- End Bootstrap --}}


    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets-mrtui/css/teknisi.css') }}">
    <!-- End layout styles -->

    {{-- Favicon --}}
    {{-- End Favicon --}}

    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('assets-mrtui/css/custom.css') }}">
    {{-- End Custom Styles --}}


    @stack('head')

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body>

    @yield('contents')

    <x-assets.bootstrap-script />
    <x-assets.jquery-script />
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @stack('script')
</body>

</html>
