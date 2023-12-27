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
        {{-- END CARD AREA --}}
        {{-- CHART AREA --}}
        <section class="chart-content row">
            <div class="card" style="min-height:300px">
                <h4 class="text-main-bold fw-bold">Data Kondisi Semua Barang</h4>
            </div>
            <div class="card" style="min-height:300px">
                <h4 class="text-main-bold fw-bold">Data Barang Masuk Tahun {{ date('Y') }}</h4>
            </div>
        </section>
        {{-- END CHART AREA --}}
    </section>
@endsection



{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
