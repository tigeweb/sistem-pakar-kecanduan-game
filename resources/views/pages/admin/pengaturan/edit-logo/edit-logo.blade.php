<div class="edit-wrapper">
    <div class="logo-wrapper">
        <h5 class="text-main-bold fw-bolder">Logo</h5>
        <img src="{{ get_setting(\App\Enums\SettingEnum::LOGO->value) }}" alt="" id="logo-mrt">
        <label for="input-mrt" class="btn-second mt-4 text-center cursor-pointer">
            <i class="bi bi-pencil-square"></i>
            Edit Logo
        </label>
        <input type="file" id="input-mrt" hidden>
    </div>
    <div class="logo-wrapper" id="mrt">
        <h5 class="text-main-bold fw-bolder">Preview Logo</h5>
        <img src="{{ asset('assets-mrtui/images/default.png') }}" id="preview-mrt" alt="">
        <button class="btn-suc mt-4" id="save-mrt" disabled><i class="bi bi-cloud-arrow-up-fill"></i> Simpan</button>
    </div>
</div>
@push('script')
    <script>
        const defaultMRT = $('#preview-mrt').attr('src');
        $('#input-mrt').on('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview-mrt').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(this.files[0]);
                $('#save-mrt').prop('disabled', false);
            }
        })
        $('#save-mrt').on('click', function() {
            const originalBtnText = $(this).html();
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            const formData = new FormData();
            formData.append('val', $('#preview-mrt').attr('src'));
            formData.append('tipe', "{{ \App\Enums\SettingEnum::LOGO->value }}");
            $.ajax({
                url: "{{ route('admin.pengaturan.ajax.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    $('#logo-mrt').attr('src', $('#preview-mrt').attr('src'));
                    $('#logo-sidebar').attr('src', $('#preview-mrt').attr('src'));
                    showSwal("mixin", res.message, "success");
                },
                error: function(res) {
                    showSwal("mixin", res.message, "error");
                },
                complete: function() {
                    $('#save-mrt').html(originalBtnText);
                    $('#preview-mrt').attr('src', defaultMRT);
                },
            });
        });
    </script>
@endpush
