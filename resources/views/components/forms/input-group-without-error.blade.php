{{--
    <x-forms.input-group label="username" id="username" name="username" placeholder="Username" />
    <x-forms.input-group label="username" id="username" name="username" value="{{ $user->username }}" placeholder="Username" />
    <x-forms.input-group label="email" type="email" id="email" name="email" value="{{ $user->email }}" placeholder="email" />


    <div class="mb-3">
        <x-forms.input-group-without-error label="username" id="username_{{ $id }}" name="username"
            placeholder="Username" className="w-100" />
        <x-errors.input-error name="username_{{ $id }}" />
    </div>
--}}

@props(['name' => '', 'id' => '', 'placeholder' => '', 'type' => 'text', 'label' => false, 'value' => '', 'className' => ''])

@if ($label)
    <x-labels.input-label for="{{ $id }}" value="{{ $label }}" />
@endif
<input type="{{ $type }}" id="{{ $id }}" class="form-control {{ $className }}"
    name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}">
