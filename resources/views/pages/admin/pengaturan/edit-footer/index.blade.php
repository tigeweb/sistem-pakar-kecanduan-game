@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Halaman Edit Footer</h3>
    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => route('admin.dashboard.index')],
        ['text' => 'Pengaturan', 'link' => route('admin.pengaturan.index')],
        ['text' => 'Edit Footer', 'link' => null],
    ]" />
@endsection
@section('contents')
    <section class="menu-section mt-4" id="edit-footer">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="copyright" class="form-label">Copyright</label>
                <div class="input-copyright">
                    <input type="text" id="copyright" class="form-control" placeholder="Masukkan copyright . . ."
                        value="{{ get_setting(\App\Enums\SettingEnum::COPYRIGHT->value) }}">
                    <button class="btn-suc" id="save-copyright"><i class="bi bi-check2"></i></button>
                </div>
            </div>
            <div class="col-sm-6 mb-3">
                <label class="form-label" for="lisensi">Lisensi Tigeweb</label>
                @php
                    $lisensi = get_setting(\App\Enums\SettingEnum::LISENSI->value);
                @endphp
                <div class="my-auto">
                    <button class="{{ $lisensi == '1' ? 'btn-del' : 'btn-suc' }} me-2" id="btn-lisensi"
                        value="{{ $lisensi == '1' ? '0' : '1' }}">
                        {!! $lisensi == '1'
                            ? '<i class="bi bi-eye-slash-fill"></i> Sembunyikan'
                            : '<i class="bi bi-eye-fill"></i> Tampilkan' !!}
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $('#save-copyright').on('click', function() {
            const originalBtnText = $(this).html();
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
            );
            const formData = new FormData();
            formData.append('val', $('#copyright').val());
            formData.append('tipe', "{{ \App\Enums\SettingEnum::COPYRIGHT->value }}");
            $.ajax({
                url: "{{ route('admin.pengaturan.ajax.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    $('#val-copyright').text($('#copyright').val())
                    showSwal("mixin", res.message, "success");
                },
                error: function(res) {
                    showSwal("mixin", res.message, "error");
                },
                complete: function() {
                    $('#save-copyright').prop("disabled", false);
                    $('#save-copyright').html(originalBtnText);
                },
            });
        })

        $('#btn-lisensi').on('click', function() {
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            const formData = new FormData();
            formData.append('val', $('#btn-lisensi').val());
            formData.append('tipe', "{{ \App\Enums\SettingEnum::LISENSI->value }}");
            $.ajax({
                url: "{{ route('admin.pengaturan.ajax.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    $('#val-lisensi').toggleClass('d-none');
                    $('#btn-lisensi').val(res.data == '1' ? '0' : '1');
                    $('#btn-lisensi').html(res.data == '1' ?
                        '<i class="bi bi-eye-slash-fill"></i> Sembunyikan' :
                        '<i class="bi bi-eye-fill"></i> Tampilkan');
                    showSwal("mixin", res.message, "success");
                },
                error: function(res) {
                    showSwal("mixin", res.message, "error");
                },
                complete: function() {
                    $('#btn-lisensi').toggleClass('btn-del btn-suc');
                },
            });
        })
    </script>
@endpush
