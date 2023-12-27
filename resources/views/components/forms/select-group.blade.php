{{--
    @php
        $kategoriSelects = [];
        foreach ($kategori as $item) {
            $kategoriSelects[$item->id] = $item->nama;
        }

        $extraOptions = [
            '' => 'Semua',
        ];
    @endphp
    <x-forms.select-group label="group name" id="group_name" name="group_name" placeholder="Choose Group Name" :optionSelects="$selectsCategory" :extraOptions="$extraOptions" />
--}}

@props([
    'name' => '',
    'id' => '',
    'className' => '',
    'optionSelects' => [],
    'value' => '',
    'placeholder' => '',
    'extraOptions' => [],
    'label' => false,
    'classGroup' => 'mb-3',
    'disabled' => 'false',
])

<div class="{{ $classGroup }}">
    @if ($label)
        <x-labels.input-label for="{{ $id }}" value="{{ $label }}" />
    @endif

    <select id="{{ $id }}" class="form-select {{ $className }}" name="{{ $name }}"
        {{ $disabled == 'true' ? 'disabled' : '' }} {{ $attributes }}>
        @if ($placeholder)
            <option value="" selected disabled>{{ $placeholder }}</option>
        @endif
        @if ($extraOptions)
            @foreach ($extraOptions as $extraOptionValue => $ExtraOptionLabel)
                <option value="{{ $extraOptionValue }}">
                    {{ $ExtraOptionLabel }}
                </option>
            @endforeach
        @endif
        @if ($optionSelects)
            @foreach ($optionSelects as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}" {{ $value == $optionValue ? 'selected' : '' }}>
                    {{ $optionLabel }}
                </option>
            @endforeach
        @endif
    </select>

    <x-errors.input-error name="{{ $name }}" />
</div>
