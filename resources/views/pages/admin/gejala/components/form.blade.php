@props(['data' => null, 'disabled' => false])

@php
    if ($data) {
        $kode_gejala = $data->kode_gejala;
        $gejala = $data->deskripsi_gejala;
        $jenis_perilaku_id = $data->jenis_perilaku_id;
    } else {
        $kode_gejala = '';
        $gejala = '';
        $jenis_perilaku_id = '';
    }
@endphp

<div class="row">
    <x-forms.input-group label="kode gejala" id="kode_gejala" name="kode_gejala" value="{{ $kode_gejala }}"
        placeholder="masukkan kode gejala..." disabled="{{ $disabled }}" />
</div>
<div class="row">
    <x-forms.select-group label="kode jenis" id="jenis_perilaku_id" name="jenis_perilaku_id"
        placeholder="Pilih Kode Jenis" value="{{ $jenis_perilaku_id }}" :optionSelects="get_select_data_custom_column($jenis_perilaku, 'nama_jenis')" />
</div>
<div class="row">
    <x-forms.textarea-group label="deskripsi gejala" id="deskripsi_gejala" name="deskripsi_gejala"
        placeholder="masukkan deskripsi gejala..." value="{{ $gejala }}" disabled="{{ $disabled }}" />
</div>
