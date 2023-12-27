{{--
    <x-assets.sweetalert />
--}}

@push('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.css"
        integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.all.min.js"
        integrity="sha512-zB7yJLSASiSevQmWCrQaq+z/f5zRIa884hwWgmK1oI3MfolIzKcpDtyfBsrGqUi/hMCObVwr/+SZTByOqh0zkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('assets-mrtui/js/sweetalert/sweet-alert.js') }}"></script>
@endpush
