@extends('layouts.app.mrtui.app')
@section('title')
    <h3>CRUD</h3>
    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => route('dashboard.index')], ['text' => 'CRUD', 'link' => null]]" />
@endsection
@section('contents')
    <section class="menu-section mt-4">
        @can(\App\Permissions\Permission::CREATE_CRUD)
            <div class="row mb-4">
                <div class="col">
                    <x-buttons.btn-save value="Masukan Data CRUD" icon="true" data-bs-target="#modalActionStore"
                        data-bs-toggle="modal" />
                </div>
            </div>
        @endcan
        <x-table id="table-crud" :headers="['no', 'string', 'created at', 'aksi']" />
    </section>

    {{-- Modal --}}
    <x-modals.modal-wrapper id="modalActionStore" size="modal-lg">
        @include('pages.superadmin.crud.modals.modal-create')
    </x-modals.modal-wrapper>
    <x-modals.modal-wrapper id="modalActionUpdate" size="modal-lg" />
    {{-- End Modal --}}
@endsection

<x-assets.datatable />
<x-assets.select />

@push('script')
    <script type="module" src="{{ asset('assets/js/pages/superadmin/crud/main.js') }}"></script>
@endpush
