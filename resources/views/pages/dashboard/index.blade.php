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
                <h4 class="text-main-bold fw-bold">Total Jenis Barang</h4>
            </div>
        </div>
        <section class="card-content row" id="card-total">
            @include('pages.dashboard.components.card-total-jenis-barang', [
                'semua_barang_count' => 0,
                'semua_barang_stand_by_count' => 0,
                'semua_barang_limbah_count' => 0,
                'semua_barang_garansi_count' => 0,
            ])
        </section>
        {{-- END CARD AREA --}}
        {{-- CHART AREA --}}
        <section class="chart-content row mb-3">
            <div class="card" style="min-height: 300px">
                <h4 class="text-main-bold fw-bold d-flex align-items-center"><span class="me-2">Data Saldo & Saving</span>
                </h4>
            </div>
            <div class="card" style="min-height:300px">
                <h4 class="text-main-bold fw-bold d-flex align-items-center"><span class="me-2">Data Barang Masuk
                        Tahun</span>
                </h4>
            </div>
            <div class="card" style="min-height:300px">
                <h4 class="text-main-bold fw-bold">Data Kondisi Semua Barang</h4>
            </div>
        </section>
        {{-- END CHART AREA --}}
    </section>
@endsection
