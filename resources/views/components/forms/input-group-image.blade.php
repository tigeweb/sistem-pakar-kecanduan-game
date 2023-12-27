{{--
    <x-forms.input-group-image name="type_icon" id="type_icon" label="type icon" onchange="previewImage('type_icon')" />
--}}

@props(['name' => '', 'id' => '', 'label' => false])

<div class="mb-3">
    @if ($label)
        <x-labels.input-label for="{{ $id }}" value="{{ $label }}" />
    @endif
    <input type="file" id="{{ $id }}" class="form-control" accept=".jpeg, .jpg, .png" name="{{ $name }}"
        {{ $attributes }}>
    <x-errors.input-error name="{{ $name }}" />
</div>
