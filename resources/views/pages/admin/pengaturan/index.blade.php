@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Halaman Pengaturan</h3>
    <x-breadcrumb :items="[['text' => 'Pengaturan', 'link' => null]]" />
@endsection
@section('contents')
    <section class="menu-section mt-4" id="pengaturan">
        <div class="menu-wrapper">
            <a class="menu-pengaturan" href="{{ route('admin.pengaturan.edit-logo.index') }}">
                <i class="bi bi-diamond-half"></i>
                <h5>Edit Logo</h5>
            </a>
            <a class="menu-pengaturan" href="{{ route('admin.pengaturan.edit-logo-title.index') }}">
                <i class="bi bi-layout-text-sidebar"></i>
                <h5>Edit Logo Title</h5>
            </a>
            <a class="menu-pengaturan" href="{{ route('admin.pengaturan.edit-footer.index') }}">
                <i class="bi bi-layers-half"></i>
                <h5>Edit Footer</h5>
            </a>
        </div>
    </section>
@endsection
