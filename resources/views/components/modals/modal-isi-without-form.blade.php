{{--
    <x-modals.modal-isi-without-form title="Data CRUD V3">

    </x-modals.modal-isi-without-form>
--}}

@props(['title' => 'Data', 'button' => false, 'buttonClose' => 'false', 'footer' => false])
<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            {{ $title }}
        </h1>
        <x-buttons.btn-close x="true" />
    </div>
    <div class="modal-body">
        {{ $slot }}
    </div>
    @if ($button || $buttonClose == 'true')
        <div class="modal-footer">
            @if ($buttonClose == 'true')
                <x-buttons.btn-close />
            @endif
            @if ($button)
                {{ $button }}
            @endif
        </div>
    @endif
    @if ($footer)
        <div class="modal-footer">
            {{ $footer }}
        </div>
    @endif
</div>
