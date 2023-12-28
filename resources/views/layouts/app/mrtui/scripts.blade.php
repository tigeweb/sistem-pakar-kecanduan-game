{{-- JQuery --}}
<x-assets.jquery-script />
{{-- End JQuery --}}

{{-- Bootstrap --}}
<x-assets.bootstrap-script />
{{-- End Bootstrap --}}

{{-- SweetAlert --}}
<x-assets.sweetalert />
{{-- End SweetAlert --}}

{{-- CSRF TOKEN --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
{{-- End CSRF TOKEN --}}

{{-- Logout --}}
<x-logout />
{{-- End Logout --}}

<script src="{{ asset('assets-mrtui/js/sidebar.js') }}"></script>
<script src="{{ asset('assets-mrtui/js/nav_onclick.js') }}"></script>

@stack('script')
