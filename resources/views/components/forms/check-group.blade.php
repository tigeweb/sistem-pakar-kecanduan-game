{{--
    <x-forms.check-group name="default" id="default" label="default" value="default"  />
--}}

@props(['name' => '', 'id' => '', 'label' => false, 'value' => '', 'className' => '', 'error' => 'true', 'checked' => 'false'])

<div class="form-check">
    <input type="checkbox" id="{{ $id }}" class="form-check-input {{ $className }}" name="{{ $name }}"
        value="{{ $value }}" {{ $checked == 'true' ? 'checked' : '' }} {{ $attributes }}>
    @if ($label)
        <x-labels.input-label for="{{ $id }}" className="form-check-label" value="{{ $label }}" />
    @endif
    @if ($error == 'true')
        <x-errors.input-error name="{{ $name }}" />
    @endif
</div>
