{{-- Bootstrap --}}
<x-assets.bootstrap-head />
<x-assets.bootstrap-icon />
{{-- End Bootstrap --}}


<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('assets-mrtui/css/admin.css') }}">
<!-- End layout styles -->

{{-- Favicon --}}
{{-- End Favicon --}}

{{-- Custom Styles --}}
<link rel="stylesheet" href="{{ asset('assets-mrtui/css/custom.css') }}">
{{-- End Custom Styles --}}


@stack('head')

<!-- Scripts -->
@vite([])
