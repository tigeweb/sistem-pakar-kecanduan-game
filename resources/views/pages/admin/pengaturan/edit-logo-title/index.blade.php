@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Halaman Edit Logo</h3>
    <x-breadcrumb :items="[
        ['text' => 'Pengaturan', 'link' => route('admin.pengaturan.index')],
        ['text' => 'Edit Logo Title', 'link' => null],
    ]" />
@endsection
@section('contents')
    <section class="menu-section mt-4">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="logo_title" class="form-label">Logo Title</label>
                <div class="d-flex gap-2">
                    <input type="text" id="logo_title" class="form-control" placeholder="Masukkan logo title . . ."
                        value="{{ get_setting(\App\Enums\SettingEnum::LOGO_TITLE->value) }}">
                    <button id="btn_logo_title" class="btn-suc"><i class="bi bi-check2"></i></button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function processFormData(val, tipe, buttonElement) {
            const originalBtnText = buttonElement.html();
            buttonElement.prop("disabled", true);
            buttonElement.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

            const formData = new FormData();
            formData.append('val', val);
            formData.append('tipe', tipe);

            $.ajax({
                url: "{{ route('admin.pengaturan.ajax.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    showSwal("mixin", res.message, "success");
                    $('.logo-title').html(res.data);
                },
                error: function(res) {
                    let errors = res.responseJSON?.errors;
                    showSwal("mixin", errors.val, "error");
                },
                complete: function() {
                    buttonElement.prop("disabled", false);
                    buttonElement.html(originalBtnText);
                },
            });
        }

        $('#btn_logo_title').on('click', function() {
            const val = $('#logo_title').val();
            const tipe = `{{ \App\Enums\SettingEnum::LOGO_TITLE->value }}`;
            const buttonElement = $(this);

            processFormData(val, tipe, buttonElement);
        });
    </script>
@endpush
