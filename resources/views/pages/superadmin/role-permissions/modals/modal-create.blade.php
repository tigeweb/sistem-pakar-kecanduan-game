<x-modals.modal-isi-store title="Tambah Izin Role" routeName="{{ route('superadmin.role-permissions.store') }}">

    @include('pages.superadmin.role-permissions.components.form')

    {{-- <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <x-forms.select-group className="form-select-store" label="role" id="role_store" name="role_store"
                placeholder="Pilih Role" :optionSelects="get_select_data_custom_column($roles, 'name')" value="" />
        </div>
        <div class="col-md-4">
            <x-forms.select-group className="form-select-store" label="akses menu" id="akses_menu_store"
                name="akses_menu_store" placeholder="Pilih Akses Menu" :optionSelects="get_select_custom($permissions, 'name', 'name')" value="" />
        </div>
        <div class="col-md-2"></div>
    </div>

    <div id="izin-akses-store">

    </div> --}}

</x-modals.modal-isi-store>

@push('script')
    <script>
        $(document).ready(function() {
            $(".form-select").select2({
                dropdownParent: $('#modalActionStore'),
                minimumResultsForSearch: Infinity,
            });

            $("#akses_menu").on('select2:select', function(e) {
                $.ajax({
                    url: "{{ route('superadmin.role-permissions.group-access') }}",
                    type: "POST",
                    data: {
                        akses_menu: $(this).val(),
                        role_id: $('#role').val(),
                    },
                    beforeSend: function() {
                        $("#izin-akses").html(
                            `<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>`
                        );
                    },
                    success: function(res) {
                        $("#izin-akses").html(res);

                    },
                });
            });
        });
    </script>
@endpush
