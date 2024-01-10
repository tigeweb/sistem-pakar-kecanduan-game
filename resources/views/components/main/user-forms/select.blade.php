<div class="row">
    <div class="input-field col s12">
        <select id="gender" name="gender" class="validate" data-error="#e3" required>
            <option value="" disabled selected>Choose Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <div id="e3"></div>
    </div>
</div>
@push('scripts')
    <script>
        $('select').material_select();
    </script>
@endpush
