import { loading } from "./modal-loading.js";
import { resetError } from "./reset-error.js";

function read(
    tableId,
    routeName,
    columns = [],
    columnDefs = [],
    additionalData = {},
    selectIds = []
) {
    const lang = {
        decimal: "",
        emptyTable: "Data Tidak Ada",
        info: "Data yang ditampilkan _START_ sampai _END_ dari _TOTAL_ data",
        infoEmpty: "Data yang ditampilkan 0 sampai 0 dari 0 data",
        infoFiltered: "(Difilter dari _MAX_ total data)",
        infoPostFix: "",
        thousands: ",",
        lengthMenu: "Perlihatkan _MENU_ data",
        loadingRecords: "Loading...",
        processing: "",
        search: "Cari:",
        searchPlaceholder: "Cari data . . .",
        zeroRecords: "Tidak ada data yang bisa ditampilkan",
        paginate: {
            first: "Pertama",
            last: "Terakhir",
            next: "Berikutnya",
            previous: "Sebelumnya",
        },
        aria: {
            sortAscending: ": activate to sort column ascending",
            sortDescending: ": activate to sort column descending",
        },
    };

    const table = $("#" + tableId).DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: routeName,
            type: "GET",
            data: function (d) {
                if (Object.keys(additionalData).length > 0) {
                    $.extend(d, additionalData);
                }
            },
            error: function (res) {
                if (res.status === 500) {
                    showSwalErrorSystem();
                }
            },
        },
        columns: columns,
        columnDefs: columnDefs,
        language: lang,
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"],
        ],
        scrollX: true,
    });

    $(".dataTables_length").addClass("form-select-datatable");

    $(".form-select-datatable select").select2({
        minimumResultsForSearch: Infinity,
    });

    const updateAdditionalData = () => {
        selectIds.forEach((selectId) => {
            additionalData[selectId] = $("#" + selectId).val();
        });
    };

    updateAdditionalData();

    selectIds.forEach((selectId) => {
        $("#" + selectId).on("change", function () {
            updateAdditionalData();
            table.draw();
        });
    });
}

function store(
    tableId,
    modalId = "modalActionStore",
    btnId = "saveBtnStore",
    formId = "formActionStore",
    customError = false,
    customReset = false
) {
    $("#" + modalId).on("hidden.bs.modal", function () {
        // Reset form
        if ($("#" + formId).length > 0) {
            $("#" + formId)[0].reset();
        }

        // Reset Error
        resetError();

        if (customReset) {
            customReset();
        }
    });
    $("#" + btnId).on("click", function () {
        $("#" + formId).trigger("submit");
    });
    $("#" + formId).on("submit", function (e) {
        e.preventDefault();
        let url = this.getAttribute("action");

        const submitBtn = $("#" + btnId);
        const originalBtnText = submitBtn.html();
        let allBtn = $("#" + modalId).find("button");

        const form = $(this);
        const formData = new FormData(this);

        $.ajax({
            url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                submitBtn.prop("disabled", true);
                submitBtn.html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                );

                allBtn.prop("disabled", true);

                form.find("input, textarea, select").prop("disabled", true);
                resetError();
            },
            success: function (res) {
                $("#" + modalId).modal("hide");
                showSwal("mixin", res.message, "success");
                form[0].reset();
                $("#" + tableId)
                    .DataTable()
                    .ajax.reload();
            },
            error: function (res) {
                if (res.status === 500) {
                    showSwalErrorSystem();
                    $("#" + modalId).modal("hide");
                } else {
                    let errors = res.responseJSON?.errors;
                    resetError();
                    if (customError) {
                        customError(errors);
                    } else {
                        $.each(errors, function (key, value) {
                            $("#" + key).addClass("is-invalid");
                            $("label.error_" + key).text(value[0]);
                        });
                    }
                }
            },
            complete: function () {
                submitBtn.prop("disabled", false);
                submitBtn.html(originalBtnText);
                allBtn.prop("disabled", false);
                form.find("input, textarea, select").prop("disabled", false);
            },
        });
    });
}

function edit_destroy(
    name,
    tableId,
    prefix = "",
    modalId = "modalActionUpdate",
    btnId = "saveBtnUpdate",
    formId = "formActionUpdate",
    customError = false,
    customReset = false
) {
    $("#" + tableId).on("click", ".action", function () {
        let data = $(this).data();
        let id = data.id;
        let jenis = data.jenis;

        if (jenis == "edit" || jenis == "detail") {
            let url = prefix + "/" + name + "/" + id;
            if (jenis == "edit") {
                url += "/edit";
            }
            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function () {
                    $("#" + modalId)
                        .find(".modal-dialog")
                        .html(loading());
                    $("#" + modalId).modal("show");
                },
                success: function (res) {
                    $("#" + modalId)
                        .find(".modal-dialog")
                        .html(res);
                    if (jenis == "edit") {
                        store(
                            tableId,
                            modalId,
                            btnId,
                            formId,
                            customError,
                            customReset
                        );
                    }
                },
                error: function (res) {
                    if (res.status === 500) {
                        showSwalErrorSystem();
                    }
                    $("#" + modalId).modal("hide");
                },
            });
        } else if (jenis == "delete") {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-danger me-2",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Apakah kamu yakin ingin menghapus data ini?",
                    text: "Kamu tidak dapat lagi mengembalikan data ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "me-2",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: prefix + "/" + name + "/" + id,
                            type: "DELETE",
                            success: function (res) {
                                swalWithBootstrapButtons.fire(
                                    "Terhapus!",
                                    "Data berhasil di hapus.",
                                    "success"
                                );
                                $("#" + tableId)
                                    .DataTable()
                                    .ajax.reload();
                            },
                            error: function (res) {
                                if (res.status === 500) {
                                    showSwalErrorSystem();
                                }
                            },
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire(
                            "Dibatalkan",
                            "Data anda aman :)",
                            "error"
                        );
                    }
                });
        }
    });
}

export { read, store, edit_destroy };
