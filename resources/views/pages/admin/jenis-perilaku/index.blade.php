@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Jenis Perilaku Kecanduan Game</h3>
    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => route('admin.dashboard.index')],
        ['text' => 'Jenis Perilaku Kecanduan Game', 'link' => null],
    ]" />
@endsection
@section('contents')
    <section class="menu-section mt-4">
        <div class="row mb-4">
            <div class="col">
                <x-buttons.btn-save value="Masukan Data Jenis Perilaku" icon="true" data-bs-target="#modalActionStore"
                    data-bs-toggle="modal" />
            </div>
        </div>
        <x-table id="table-jenis-perilaku" :headers="['no', 'kode jenis', 'jenis perilaku kecanduan game', 'aksi']" />
    </section>

    {{-- Modal --}}
    <x-modals.modal-wrapper id="modalActionStore">
        @include('pages.admin.jenis-perilaku.modals.modal-create')
    </x-modals.modal-wrapper>
    <x-modals.modal-wrapper id="modalActionUpdate" />
    {{-- End Modal --}}
@endsection

<x-assets.datatable />
<x-assets.select />

@push('script')
    <script type="module" src="{{ asset('assets/js/pages/admin/jenis-perilaku/main.js') }}"></script>
@endpush
