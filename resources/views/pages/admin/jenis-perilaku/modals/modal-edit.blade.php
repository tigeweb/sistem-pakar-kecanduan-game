<x-modals.modal-isi-store title="Edit Data Jenis Perilaku"
    routeName="{{ route('admin.jenis-perilaku.update', ['jenis_perilaku' => $data->id]) }}" id="formActionUpdate"
    btnId="saveBtnUpdate" btnSimpan="Simpan Perubahan">
    @method('PUT')

    @include('pages.admin.jenis-perilaku.components.form', ['data' => $data])

</x-modals.modal-isi-store>
