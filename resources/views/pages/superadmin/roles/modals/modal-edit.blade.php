<x-modals.modal-isi-store title="Edit Role" routeName="{{ route('superadmin.roles.update', ['role' => $data->id]) }}"
    id="formActionUpdate" btnId="saveBtnUpdate" btnSimpan="Simpan Perubahan">
    @method('PUT')

    @include('pages.superadmin.roles.components.form', ['data' => $data])

</x-modals.modal-isi-store>
