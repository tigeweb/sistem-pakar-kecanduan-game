{{--
    <x-forms.textarea-group label="short_desc" id="short_desc" name="short_desc" placeholder="short desc" />
--}}

@props([
    'name' => '',
    'id' => '',
    'className' => '',
    'placeholder' => '',
    'label' => false,
    'value' => '',
    'cols' => 5,
    'rows' => 3,
])

<div class="mb-3">
    @if ($label)
        <x-labels.input-label for="{{ $id }}" value="{{ $label }}" />
    @endif
    <textarea class="form-control {{ $className }}" name="{{ $name }}" id="{{ $id }}"
        cols="{{ $cols }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" {{ $attributes }}>{{ $value ?? '' }}</textarea>
    <x-errors.input-error name="{{ $name }}" />
</div>
