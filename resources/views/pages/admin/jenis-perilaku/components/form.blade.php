@props(['data' => null, 'disabled' => false])

@php
    if ($data) {
        $kode_jenis = $data->kode_jenis;
        $nama_jenis = $data->nama_jenis;
        $solusi = $data->solusi;
        $keterangan_solusi = $data->keterangan_solusi;
    } else {
        $kode_jenis = '';
        $nama_jenis = '';
        $solusi = '';
        $keterangan_solusi = '';
    }
@endphp

<div class="row">
    <x-forms.input-group label="kode jenis" id="kode_jenis" name="kode_jenis" value="{{ $kode_jenis }}"
        placeholder="masukkan kode jenis..." disabled="{{ $disabled }}" />
</div>
<div class="row">
    <x-forms.input-group label="jenis perilaku" id="nama_jenis" name="nama_jenis" value="{{ $nama_jenis }}"
        placeholder="masukkan jenis perilaku..." disabled="{{ $disabled }}" />
</div>
<div class="row">
    <x-forms.input-group label="solusi" id="solusi" name="solusi" value="{{ $solusi }}"
        placeholder="masukkan solusi..." disabled="{{ $disabled }}" />
</div>
<div class="row">
    <x-forms.textarea-group label="keterangan solusi" id="keterangan_solusi" name="keterangan_solusi"
        placeholder="Masukkan Keterangan Solusi..." value="{{ $keterangan_solusi }}" disabled="{{ $disabled }}" />
</div>
