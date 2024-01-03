{{--
    <x-modals.modal-wrapper />
--}}

@props([
    'size' => '',
    'id' => 'modalAction',
    'classModal' => '',
])

<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable {{ $classModal }} {{ $size }}">
        {{ $slot ?? '' }}
    </div>
</div>
