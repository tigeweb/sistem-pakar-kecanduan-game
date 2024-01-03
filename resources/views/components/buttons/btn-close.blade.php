{{--
    <x-buttons.btn-close />
--}}

@props([
    'value' => 'Batal X',
    'x' => false,
])

@if (!$x)
    <button type="button" data-bs-dismiss="modal" class="btn-del px-4">{{ $value }}</button>
@else
    <button type="button" data-bs-dismiss="modal" class="btn-close" aria-label="Close"></button>
@endif
