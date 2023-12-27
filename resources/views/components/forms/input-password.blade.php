{{--
    <x-forms.input-password label="current password" id="current_password" name="current_password" placeholder="current password" />
    <x-forms.input-password label="new password" id="new_password" name="new_password" placeholder="new password" />
    <x-forms.input-password label="new password confirmation" id="new_password_confirmation" name="new_password_confirmation" placeholder="new password confirmation" />
--}}

@props(['name', 'id', 'placeholder' => 'Masukkan Password Anda...', 'label' => false, 'className' => ''])

<div class="mb-3">
    @if ($label)
        <x-labels.input-label for="{{ $id }}" value="{{ $label }}" />
    @endif
    <div class="pw-area">
        <input type="password" id="{{ $id }}" class="form-control {{ $className }}" name="{{ $name }}"
            placeholder="{{ $placeholder }}" {{ $attributes }}>
        <span class="pw-eye" pw-eye-for="{{ $id }}" style="right: 21px"><i class="bi bi-eye-fill"></i></span>
    </div>
    <x-errors.input-error name="{{ $name }}" />
</div>
{{-- <div class="mb-3 pw-area">
    @if ($label)
        <x-labels.input-label for="{{ $id }}" value="{{ $label }}" />
    @endif
    <input type="password" id="{{ $id }}" class="form-control {{ $className }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}">
    <span class="pw-eye" pw-eye-for="{{ $id }}" style="right: 21px"><i class="bi bi-eye-fill"></i></span>
    <x-errors.input-error name="{{ $name }}" />
</div> --}}
