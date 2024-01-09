@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Halaman Izin Akses</h3>
    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => route('dashboard.index')], ['text' => 'Izin Akses', 'link' => null]]" />
@endsection
@section('contents')
    <section class="menu-section mt-4">
        @can(\App\Permissions\Permission::CREATE_ROLE_PERMISSIONS)
            <div class="row mb-4">
                <div class="col">
                    <x-buttons.btn-save value="Tambah Izin Role" icon="true" data-bs-target="#modalActionStore"
                        data-bs-toggle="modal" />
                </div>
            </div>
        @endcan
        <x-table id="table-role-permissions" :headers="['no', 'role', 'izin akses', 'aksi']" />
    </section>

    {{-- Modal --}}
    <x-modals.modal-wrapper id="modalActionStore" size="modal-xl">
        @include('pages.superadmin.role-permissions.modals.modal-create')
    </x-modals.modal-wrapper>
    <x-modals.modal-wrapper id="modalActionUpdate" size="modal-xl" />
    {{-- End Modal --}}
@endsection

<x-assets.datatable />
<x-assets.select />

@push('script')
    <script type="module" src="{{ asset('assets/js/pages/superadmin/role-permissions/main.js') }}"></script>
@endpush
