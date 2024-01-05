@props(['data' => null, 'disabled' => false])

@php
    if ($data) {
        $string = $data->string;
    } else {
        $string = '';
    }
@endphp

<div class="row">
    <div class="col-md-4">
        <x-forms.input-group label="string" id="string" name="string" value="{{ $string }}"
            placeholder="masukkan string..." disabled="{{ $disabled }}" />
    </div>
</div>
