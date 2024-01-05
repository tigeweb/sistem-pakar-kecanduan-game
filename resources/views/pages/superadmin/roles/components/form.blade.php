@props(['data' => null, 'disabled' => false])

<div class="row">
    <x-forms.input-group label="role" id="role" name="role" value="{{ $data->name ?? '' }}"
        placeholder="masukkan role..." disabled="{{ $disabled }}" />
</div>
