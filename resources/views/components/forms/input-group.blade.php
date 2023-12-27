{{--
    <x-forms.input-group label="username" id="username" name="username" placeholder="Username" />
    <x-forms.input-group label="username" id="username" name="username" value="{{ $user->username }}" placeholder="Username" />
    <x-forms.input-group label="email" type="email" id="email" name="email" value="{{ $user->email }}" placeholder="email" />
--}}

@props([
    'name' => '',
    'id' => '',
    'placeholder' => '',
    'type' => 'text',
    'label' => false,
    'value' => '',
    'className' => '',
    'classNameGroup' => 'mb-3',
])

<div class="{{ $classNameGroup }}">
    @if ($label)
        <x-labels.input-label for="{{ $id }}" value="{{ $label }}" />
    @endif
    <input type="{{ $type }}" id="{{ $id }}" class="form-control {{ $className }}"
        name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}" {{ $attributes }}>
    <x-errors.input-error name="{{ $name }}" />
</div>
