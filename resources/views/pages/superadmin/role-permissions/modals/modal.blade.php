<x-modals.modal-isi-update title="Edit Izin Role"
    routeNameUpdate="{{ route('superadmin.ajax.role-permissions.update', ['role_permission' => $data_role->id]) }}">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <x-forms.select-group className="form-select-update" label="role" id="role" name="role"
                placeholder="Pilih Role" :optionSelects="get_select_data_custom_column($roles, 'name')" value="{{ $data_role->id ?? '' }}" disabled="true" />
        </div>
        <div class="col-md-4">
            <x-forms.select-group className="form-select-update" label="akses menu" id="akses_menu" name="akses_menu"
                placeholder="Pilih Akses Menu" :optionSelects="get_select_custom($permissions, 'name', 'name')" value="{{ $data_permissions->name ?? '' }}" />
        </div>
        <div class="col-md-2"></div>
    </div>

    <div id="izin-akses">

    </div>

</x-modals.modal-isi-update>

<script>
    $(document).ready(function() {
        $(".form-select-update").select2({
            dropdownParent: $('#modalAction'),
            minimumResultsForSearch: Infinity,
        });

        $("#akses_menu").on('select2:select', function(e) {
            $.ajax({
                url: "{{ route('superadmin.ajax.role-permissions.group-access') }}",
                type: "POST",
                data: {
                    akses_menu: $(this).val(),
                    role_id: "{{ $data_role->id ?? '' }}",
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
        }).trigger('select2:select');
    });
</script>
