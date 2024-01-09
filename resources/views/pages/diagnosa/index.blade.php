@extends('layouts.app.mrtui.app')
@section('title')
    <h3>Diagnosa</h3>
    <x-breadcrumb :items="[['text' => 'Diagnosa', 'link' => null]]" />
@endsection
@section('contents')
    <section class="menu-section mt-4">
        <form action="{{ route('diagnosa.store') }}" method="POST" id="formActionPost">
            @csrf

            @foreach ($deskripsi_gejala as $q)
                <div class="row">
                    <p>{{ $loop->iteration }}. {{ $q->deskripsi_gejala }}</p>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gejala[{{ $q->id }}]"
                                id="ya_gejala_{{ $q->id }}" value="1" required>
                            <x-labels.input-label for="ya_gejala_{{ $q->id }}" className="form-check-label"
                                value="Ya" />
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gejala[{{ $q->id }}]"
                                id="tidak_gejala_{{ $q->id }}" value="0" required>
                            <x-labels.input-label for="tidak_gejala_{{ $q->id }}" className="form-check-label"
                                value="Tidak" />
                        </div>
                    </div>
                </div>
            @endforeach

            <x-buttons.btn-save value="Simpan" id="submitBtn" />
        </form>
    </section>
@endsection

{{-- @push('script')
    <script>
        $(document).ready(function() {
            $("#formActionPost").on("submit", function(e) {
                e.preventDefault();
                let url = this.getAttribute("action");

                const submitBtn = $("#submitBtn");
                const originalBtnText = submitBtn.html();
                let allBtn = $("#formActionPost").find("button");

                const form = $(this);
                const formData = new FormData(this);

                $.ajax({
                    url,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        submitBtn.prop("disabled", true);
                        submitBtn.html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                        );

                        allBtn.prop("disabled", true);

                        form.find("input, textarea, select").prop("disabled", true);
                        resetError();
                    },
                    success: function(res) {
                        showSwal("mixin", res.message, "success");
                        form[0].reset();
                    },
                    error: function(res) {
                        if (res.status === 500) {
                            showSwalErrorSystem();
                        } else {
                            let errors = res.responseJSON?.errors;
                            $.each(errors, function(key, value) {
                                $("#" + key).addClass("is-invalid");
                                $("label.error_" + key).text(value[0]);
                            });
                        }
                    },
                    complete: function() {
                        submitBtn.prop("disabled", false);
                        submitBtn.html(originalBtnText);
                        allBtn.prop("disabled", false);
                        form.find("input, textarea, select").prop("disabled", false);
                    },
                });
            });
        });
    </script>
@endpush --}}
