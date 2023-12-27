{{--
    <x-buttons.btn-save />
    <x-buttons.btn-save value="" icon="true" />
    <x-buttons.btn-save icon="true" />
    <x-buttons.btn-save value="Masuk >" />
--}}

@props([
    'className' => 'add-button',
    'value' => '',
    'icon' => 'false',
    'iconClass' => 'bi-plus',
    'type' => 'submit',
])

<button type="{{ $type }}" class="btn-main {{ $className }}" {{ $attributes }}>
    @if ($icon == 'true')
        <i class="bi {{ $iconClass }}"></i>
    @endif
    @if ($value)
        {{ $value }}
    @endif
</button>
