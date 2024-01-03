<x-modals.modal-isi-store title="Edit Data Akun Dosen" routeName="{{ route('crud.update', ['crud' => $data->id]) }}"
    id="formActionUpdate" btnId="saveBtnUpdate" btnSimpan="Simpan Perubahan">
    @method('PUT')

    <div class="row">
        <div class="col-md-4">
            <x-forms.input-group label="string" id="string" name="string" value="{{ $data->string ?? '' }}"
                placeholder="masukkan string..." />
        </div>
    </div>

</x-modals.modal-isi-store>
