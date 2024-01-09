<x-modals.modal-isi-store title="Edit Data Akun Dosen" routeName="{{ route('admin.crud.update', ['crud' => $data->id]) }}"
    id="formActionUpdate" btnId="saveBtnUpdate" btnSimpan="Simpan Perubahan">
    @method('PUT')

    @include('pages.superadmin.crud.components.form', ['data' => $data])

</x-modals.modal-isi-store>
