{{--
    <x-buttons.btn-edit />
    <x-buttons.btn-edit value="" icon="true" />
    <x-buttons.btn-edit icon="true" />
    <x-buttons.btn-edit value="Masuk >" />
--}}

@props([
    'className' => '',
    'value' => '',
    'icon' => false,
])

<button type="submit" class="btn-second {{ $className }}" {{ $attributes }}>
    @if ($icon)
        <i class="bi bi-pencil-square"></i>
    @endif
    @if ($value)
        {{ $value }}
    @endif
</button>
