@extends('layouts.app.mrtui.app')
@section('title')
    <h3>CRUD</h3>
    <x-breadcrumb :items="[['text' => 'CRUD', 'link' => null]]" />
@endsection
@section('contents')
    <section class="menu-section mt-4">
        <x-table id="table-crud" :headers="['no', 'string', 'created at', 'aksi']" />
    </section>
@endsection

<x-assets.datatable />
<x-assets.select />

@push('script')
    <script type="module" src="{{ asset('assets-mrtui/js/pages/superadmin/crud/main.js') }}"></script>
@endpush
