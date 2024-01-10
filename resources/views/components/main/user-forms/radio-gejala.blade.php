@props(['name' => '', 'id' => ''])
<div class="row">
    <div class="input-field col s12">
        <p for="{{ $name }}">{{ $slot }}</p>
        <input name="{{ $name }}" type="radio" id="{{ $name }}_" value=""
            data-error="#{{ $id }}" checked hidden>
        <div>
            <input name="{{ $name }}" type="radio" id="{{ $name }}_ya" value="1"
                data-error="#{{ $id }}">
            <label for="{{ $name }}_ya" class="text-dark">Iya</label>
        </div>
        <p>
            <input name="{{ $name }}" type="radio" id="{{ $name }}_tidak" value="0"
                data-error="#{{ $id }}">
            <label for="{{ $name }}_tidak" class="text-dark">Tidak</label>
        </p>
        <div class="input-field">
            <br>
            <div id="{{ $id }}-error"></div>
        </div>
    </div>
</div>
<hr>
