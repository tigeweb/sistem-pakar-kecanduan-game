@extends('layout.admin._main')
@section('admin_title')
    <h3>Halaman Izin Akses</h3>
    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => route('dashboard.index')], ['text' => 'Izin Akses', 'link' => null]]" />
@endsection
@section('admin_body')
    <section class="menu-section mt-4">
        @can(\App\Permissions\Permission::CREATE_ROLE_PERMISSIONS)
            <div class="row mb-4">
                <div class="col">
                    <x-buttons.btn-save value="Tambah Izin Role" icon="true" data-bs-target="#modalActionStore"
                        data-bs-toggle="modal" />
                    {{-- <x-buttons.btn-save value="Tambah Izin Role" icon="true" /> --}}
                </div>
            </div>
        @endcan
        <x-table id="table-role-permissions" :headers="['no', 'role', 'permissions', 'aksi']" />
    </section>

    <x-modals.modal-wrapper id="modalActionStore" size="modal-xl">
        @include('pages.superadmin.role-permissions.modals.modal-create')
    </x-modals.modal-wrapper>
    <x-modals.modal-wrapper size="modal-xl" />
@endsection

{{-- <x-assets.sweetalert /> --}}
<x-assets.datatable />
<x-assets.select />

@push('scripts')
    <script type="module" src="{{ asset('assets/js/superadmin/pages/role-permissions/main.js') }}"></script>
@endpush
