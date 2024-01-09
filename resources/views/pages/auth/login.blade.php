@extends('layouts.auth.mrtui.app')
@section('contents')
    @include('pages.auth.admin')
@endsection

<x-assets.sweetalert />

@push('script')
    <x-password-eye-script />

    <script src="{{ asset('assets/js/auth/login-submit.js') }}"></script>
    <script>
        $(document).ready(function() {
            loginSubmit('loginSubmit_admin', 'admin');

            @if (Session::has('success'))
                showSwal("mixin", "{{ Session::get('success') }}", "success");
            @endif
        });
    </script>
@endpush
