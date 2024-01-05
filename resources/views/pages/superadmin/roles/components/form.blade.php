@props(['data' => null, 'disabled' => false])

@php
    if ($data) {
        $role = $data->name;
        $color = $data->color;
        $background_color = convertRgbaToHex($data->background_color);
    } else {
        $role = '';
        $color = '#ffffff';
        $background_color = '#000000';
    }
@endphp

<div class="row">
    <x-forms.input-group label="nama role" id="role" name="role" value="{{ $role }}"
        placeholder="masukkan nama role..." disabled="{{ $disabled }}" />
</div>
<div class="row">
    <div class="col-auto">
        <x-forms.input-group type="color" label="warna teks" id="color" name="color" value="{{ $color }}"
            disabled="{{ $disabled }}" style="width: 50px; padding: 5px; border-radius: 5px; cursor: pointer" />
    </div>
    <div class="col-auto">
        <x-forms.input-group type="color" label="warna latar belakang teks" id="background_color"
            name="background_color" value="{{ $background_color }}" disabled="{{ $disabled }}"
            style="width: 50px; padding: 5px; border-radius: 5px; cursor: pointer" />
    </div>
</div>
