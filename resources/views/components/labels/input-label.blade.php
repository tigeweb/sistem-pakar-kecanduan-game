{{--
    <x-labels.input-label for="{{ $id }}" value="{{ $label }}" />

    <x-labels.input-label className="form-check-label" for="remember_me" value="Remember Me" />
--}}

@props(['value', 'className' => ''])

<label class="form-label text-capitalize" {{ $attributes }}>{{ $value ?? $slot }}</label>
