function loginSubmit(formId, id) {
    $("#" + formId).on("submit", function (e) {
        e.preventDefault();

        let url = $(this).attr("action");

        const form = $(this);
        const formData = new FormData(this);

        const submitBtn = $(this).find('button[type="submit"]');
        const originalBtnText = submitBtn.html();

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                submitBtn.prop("disabled", true);
                submitBtn.html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                );

                form.find("input").prop("disabled", true);
                resetError();
            },
            success: function (res) {
                showSwal("mixin", res.message, "success");
                window.location.href = res.route;
                form[0].reset();

                submitBtn.prop("disabled", true);
                form.find("input").prop("disabled", true);
            },
            error: function (res) {
                let errors = res.responseJSON?.errors;

                if (res.status == 401) {
                    showSwal("mixin", res.responseJSON.message, "error");
                    form[0].reset();
                    submitBtn.prop("disabled", false);
                    form.find("input").prop("disabled", false);
                    return;
                }

                if (res.status == 500) {
                    showSwalErrorSystem();
                    form[0].reset();
                    submitBtn.prop("disabled", false);
                    form.find("input").prop("disabled", false);
                    return;
                }

                if (res.status == 419) {
                    showSwal(
                        "mixin",
                        "Halaman telah kedaluwarsa, Halaman akan dimuat ulang",
                        "error"
                    );
                    form[0].reset();
                    window.location.reload();
                    submitBtn.prop("disabled", false);
                    form.find("input").prop("disabled", false);
                    return;
                }

                showSwal("mixin", "Periksa kembali form anda", "error");

                $.each(errors, function (key, value) {
                    if (key == "password") {
                        $("." + key)
                            .parent("div")
                            .addClass("is-invalid");
                        $("." + key).addClass("is-invalid");
                    } else {
                        $("." + key).addClass("is-invalid");
                    }
                    $("label.error_" + key).text(value[0]);
                });

                submitBtn.prop("disabled", false);
                form.find("input").prop("disabled", false);
            },
            complete: function () {
                submitBtn.html(originalBtnText);
            },
        });
    });
}

function resetError() {
    $(".is-invalid").removeClass("is-invalid");
    $(".invalid-feedback").html("");
}
