@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Halaman Role</h3>
    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => route('dashboard.index')], ['text' => 'Role', 'link' => null]]" />
@endsection
@section('contents')
    <section class="menu-section mt-4">
        @can(\App\Permissions\Permission::CREATE_ROLES)
            <div class="row mb-4">
                <div class="col">
                    <x-buttons.btn-save value="Tambah Role" icon="true" data-bs-target="#modalActionStore"
                        data-bs-toggle="modal" />
                </div>
            </div>
        @endcan
        <x-table id="table-roles" :headers="['no', 'role', 'aksi']" />
    </section>

    {{-- Modal --}}
    <x-modals.modal-wrapper id="modalActionStore">
        @include('pages.superadmin.roles.modals.modal-create')
    </x-modals.modal-wrapper>
    <x-modals.modal-wrapper id="modalActionUpdate" />
    {{-- End Modal --}}
@endsection

<x-assets.datatable />
<x-assets.select />

@push('script')
    <script type="module" src="{{ asset('assets/js/pages/superadmin/roles/main.js') }}"></script>
@endpush
