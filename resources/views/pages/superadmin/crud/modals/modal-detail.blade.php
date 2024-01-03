<x-modals.modal-isi-without-form title="Detail Data CRUD">

    <div class="row">
        <div class="col-md-4">
            <x-forms.input-group label="string" id="string" name="string" value="{{ $data->string ?? '' }}"
                placeholder="masukkan string..." disabled />
        </div>
    </div>

</x-modals.modal-isi-without-form>
