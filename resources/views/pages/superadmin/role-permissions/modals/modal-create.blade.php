<x-modals.modal-isi-store title="Tambah Izin Role" routeNameStore="{{ route('superadmin.ajax.role-permissions.store') }}">

    <div class="row">
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

    </div>

</x-modals.modal-isi-store>

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".form-select-store").select2({
                dropdownParent: $('#modalActionStore'),
                minimumResultsForSearch: Infinity,
            });

            $("#akses_menu_store").on('select2:select', function(e) {
                $.ajax({
                    url: "{{ route('superadmin.ajax.role-permissions.group-access') }}",
                    type: "POST",
                    data: {
                        akses_menu: $(this).val(),
                        role_id: "",
                    },
                    beforeSend: function() {
                        $("#izin-akses-store").html(
                            `<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>`
                        );
                    },
                    success: function(res) {
                        $("#izin-akses-store").html(res);

                    },
                });
            });
        });
    </script>
@endpush
