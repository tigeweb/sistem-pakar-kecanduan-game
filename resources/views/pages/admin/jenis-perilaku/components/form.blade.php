@props(['data' => null, 'disabled' => false])

@php
    if ($data) {
        $kode_jenis = $data->kode_jenis;
        $nama_jenis = $data->nama_jenis;
    } else {
        $kode_jenis = '';
        $nama_jenis = '';
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
