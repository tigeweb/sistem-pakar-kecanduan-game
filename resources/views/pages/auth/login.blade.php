@extends('layout.auth._main')
@section('auth_body')
    @include('pages.auth.teknisi')
    @include('pages.auth.admin')
@endsection

<x-assets.sweetalert />

@push('scripts')
    <x-password-eye-script />

    <script src="{{ asset('assets/js/auth/ajax/login-submit.js') }}"></script>
    <script>
        $(document).ready(function() {
            loginSubmit('loginSubmit_admin', 'admin');
            loginSubmit('loginSubmit_teknisi', 'teknisi');

            @if (Session::has('success'))
                showSwal("mixin", "{{ Session::get('success') }}", "success");
            @endif
        });
    </script>
@endpush
