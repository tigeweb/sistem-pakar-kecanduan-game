{{--
    <x-buttons.btn-detail />
    <x-buttons.btn-detail value="" icon="true" />
    <x-buttons.btn-detail icon="true" />
    <x-buttons.btn-detail value="Masuk >" />
--}}

@props([
    'className' => '',
    'value' => '',
    'icon' => false,
    'type' => 'submit',
])

<button type="{{ $type }}" class="btn-inf {{ $className }}" {{ $attributes }}>
    @if ($icon)
        <i class="bi bi-eye"></i>
    @endif
    @if ($value)
        {{ $value }}
    @endif
</button>
