{{--
    <x-buttons.btn-delete />
    <x-buttons.btn-delete value="" icon="true" />
    <x-buttons.btn-delete icon="true" />
    <x-buttons.btn-delete value="Masuk >" />
--}}

@props([
    'className' => '',
    'value' => '',
    'icon' => false,
])

<button type="button" class="btn-del {{ $className }}" {{ $attributes }}>
    @if ($icon)
        <i class="bi bi-trash"></i>
    @endif
    @if ($value)
        {{ $value }}
    @endif
</button>
