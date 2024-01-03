{{--
    <x-modals.modal-isi-store title="Satuan Barang" routeName="{{ route('superadmin.ajax.satuan-barang.store') }}">

        <div class="row">
            <div class="col-12">
                <x-forms.input-group label="Satuan (Stn)" id="satuan" name="satuan" value=""
                    placeholder="Satuan (Stn)" />
            </div>
        </div>

    </x-modals.modal-isi-store>

--}}

@props([
    'title' => 'Data',
    'routeName',
    'btnSimpan' => 'Simpan Data >',
    'footer' => false,
    'id' => 'formActionStore',
    'btnId' => 'saveBtnStore',
])
<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            {{ $title }}
        </h1>
        <x-buttons.btn-close x="true" />
    </div>
    <div class="modal-body">
        <form id="{{ $id }}" action="{{ $routeName }}" method="POST">
            @csrf
            {{ $slot }}
        </form>
    </div>
    <div class="modal-footer">
        @if ($footer)
            {{ $footer }}
        @else
            <x-buttons.btn-close />
            <x-buttons.btn-save :value="$btnSimpan" id="{{ $btnId }}" />
        @endif
    </div>
</div>
