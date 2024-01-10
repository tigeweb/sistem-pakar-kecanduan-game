@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Halaman Gejala</h3>
    <x-breadcrumb :items="[['text' => 'Gejala', 'link' => null]]" />
@endsection
@section('contents')
    <section class="menu-section mt-4">
        <div class="row mb-4">
            <div class="col">
                <x-buttons.btn-save value="Masukan Gejala" icon="true" data-bs-target="#modalActionStore"
                    data-bs-toggle="modal" />
            </div>
        </div>
        <x-table id="table-gejala" :headers="['no', 'kode gejala', 'kode jenis', 'gejala', 'aksi']" />
    </section>

    {{-- Modal --}}
    <x-modals.modal-wrapper id="modalActionStore">
        @include('pages.admin.gejala.modals.modal-create')
    </x-modals.modal-wrapper>
    <x-modals.modal-wrapper id="modalActionUpdate" />
    {{-- End Modal --}}
@endsection

<x-assets.datatable />
<x-assets.select />

@push('script')
    <script type="module" src="{{ asset('assets/js/pages/admin/gejala/main.js') }}"></script>
@endpush
