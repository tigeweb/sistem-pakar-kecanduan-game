{{--
    <x-errors.input-error name="{{ $name }}" />
--}}

@props(['name'])

{{-- error untuk ajax --}}
<label class="invalid-feedback error_{{ $name }}" for="{{ $name }}"></label>
