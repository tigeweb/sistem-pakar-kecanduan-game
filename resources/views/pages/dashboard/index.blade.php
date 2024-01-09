@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Dashboard</h3>
    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => null]]" />
@endsection
@section('contents')
    <section id="dashboard" class="menu-section mt-3">
        {{-- CARD AREA --}}
        <div class="row">
            <div class="d-flex justify-content-between align-items-end">
                <h4 class="text-main-bold fw-bold">Total Data</h4>
            </div>
        </div>
        <section class="card-content row" id="card-total">
            @include('pages.dashboard.components.card-total-jenis-barang', [
                'jenis_perilaku_count' => $jenis_perilaku_count,
                'gejala_count' => $gejala_count,
                'semua_barang_limbah_count' => 0,
                'semua_barang_garansi_count' => 0,
            ])
        </section>
        {{-- END CARD AREA --}}
    </section>
@endsection
