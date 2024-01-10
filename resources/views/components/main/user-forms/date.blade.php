<div class="row">
    <div class="input-field col s12">
        <label for="birthdate">Date of Birth</label>
        <input type="date" id="birthdate" class="datepicker" name="birthdate" data-error="#e5" required>
        <div id="e5"></div>
    </div>
</div>
@push('scripts')
    <script>
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 15
        });
    </script>
@endpush
