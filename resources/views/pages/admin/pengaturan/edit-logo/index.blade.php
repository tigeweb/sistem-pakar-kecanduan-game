@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Halaman Edit Logo</h3>
    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => route('admin.dashboard.index')],
        ['text' => 'Pengaturan', 'link' => route('admin.pengaturan.index')],
        ['text' => 'Edit Logo', 'link' => null],
    ]" />
@endsection
@section('contents')
    <section class="menu-section mt-4" id="edit-logo">
        @include('pages.admin.pengaturan.edit-logo.edit-logo')
    </section>
@endsection
