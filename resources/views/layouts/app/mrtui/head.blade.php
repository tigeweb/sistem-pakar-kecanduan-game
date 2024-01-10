{{-- Bootstrap --}}
<x-assets.bootstrap-head />
<x-assets.bootstrap-icon />
{{-- End Bootstrap --}}


<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('assets-mrtui/css/admin.css') }}">
<!-- End layout styles -->

{{-- Favicon --}}
<link rel="shortcut icon" href="{{ get_setting(\App\Enums\SettingEnum::LOGO->value) }}" type="image/x-icon">
{{-- End Favicon --}}

{{-- Custom Styles --}}
{{-- General --}}
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
{{-- End General --}}

<link rel="stylesheet" href="{{ asset('assets-mrtui/css/custom.css') }}">
{{-- End Custom Styles --}}


@stack('head')

<!-- Scripts -->
{{-- @vite([]) --}}
