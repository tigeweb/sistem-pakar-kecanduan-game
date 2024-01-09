<x-modals.modal-isi-store title="Edit Gejala" routeName="{{ route('admin.gejala.update', ['gejala' => $data->id]) }}"
    id="formActionUpdate" btnId="saveBtnUpdate" btnSimpan="Simpan Perubahan">
    @method('PUT')

    @include('pages.admin.gejala.components.form', ['data' => $data])

</x-modals.modal-isi-store>

<script>
    $(".form-select").select2({
        minimumResultsForSearch: Infinity,
        dropdownParent: $("#modalActionUpdate"),
    });
</script>
