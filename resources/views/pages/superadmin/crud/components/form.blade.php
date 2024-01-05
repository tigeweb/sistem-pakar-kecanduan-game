@props(['data' => null, 'disabled' => false])

<div class="row">
    <div class="col-md-4">
        <x-forms.input-group label="string" id="string" name="string" value="{{ $data->string ?? '' }}"
            placeholder="masukkan string..." disabled="{{ $disabled }}" />
    </div>
</div>
