@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Halaman Edit Gambar Sidebar</h3>
    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => route('admin.dashboard.index')],
        ['text' => 'Pengaturan', 'link' => route('admin.pengaturan.index')],
        ['text' => 'Edit Gambar Sidebar', 'link' => null],
    ]" />
@endsection
@section('contents')
    <section class="menu-section mt-4" id="edit-gambar-sidebar">
        <div class="edit-wrapper">
            <h5 class="text-main-bold fw-bolder">Gambar Sidebar</h5>
            <img src="{{ get_setting(\App\Enums\SettingEnum::GAMBAR_SIDEBAR->value) }}" alt="gambar sidebar"
                id="gambar-sidebar">
            <label for="input-gambar-sidebar" class="btn-second mt-4 text-center cursor-pointer">
                <i class="bi bi-pencil-square"></i>
                Edit Gambar Sidebar
            </label>
            <input type="file" id="input-gambar-sidebar" hidden>
        </div>
        <div class="edit-wrapper">
            <h5 class="text-main-bold fw-bolder">Preview Sidebar</h5>
            <img src="{{ asset('assets-mrtui/images/default.png') }}" alt="preview gambar sidebar"
                id="preview-gambar-sidebar">
            <button class="btn-suc mt-4" id="save-sidebar" disabled>
                <i class="bi bi-cloud-arrow-up-fill"></i>
                Simpan
            </button>
        </div>
    </section>
@endsection
@push('script')
    <script>
        const defaultGMBRSIDEBAR = $('#preview-gambar-sidebar').attr('src');
        $('#input-gambar-sidebar').on('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview-gambar-sidebar').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(this.files[0]);
                $('#save-sidebar').prop('disabled', false);
            }
        })
        $('#save-sidebar').on('click', function() {
            const originalBtnText = $(this).html();
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            const formData = new FormData();
            formData.append('val', $('#preview-gambar-sidebar').attr('src'));
            formData.append('tipe', "{{ \App\Enums\SettingEnum::GAMBAR_SIDEBAR->value }}");
            $.ajax({
                url: "{{ route('admin.pengaturan.ajax.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    $('#gambar-sidebar').attr('src', $('#preview-gambar-sidebar').attr('src'));
                    $('#img-sidebar').attr('src', $('#preview-gambar-sidebar').attr('src'));
                    showSwal("mixin", res.message, "success");
                },
                error: function(res) {
                    showSwal("mixin", res.message, "error");
                },
                complete: function() {
                    $('#save-sidebar').html(originalBtnText);
                    $('#preview-gambar-sidebar').attr('src', defaultGMBRSIDEBAR);
                },
            });
        });
    </script>
@endpush
