$(function () {
    showSwal = function (type, title, icon, text) {
        "use strict";
        if (type === "mixin") {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: icon,
                title: title,
            });
        } else if (type === "mixin top-start") {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-start",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: icon,
                title: title,
            });
        } else if (type === "centerOK") {
            Swal.fire({
                title: title,
                text: text,
                icon: icon,
            });
        }
    };

    showSwalErrorSystem = function () {
        "use strict";
        showSwal(
            "mixin",
            "Terjadi kesalahan sistem, silahkan hubungi admin",
            "error"
        );
    };

    showSwalConfirmDelete = function (prefix, name, id, tableId) {
        "use strict";
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn-main",
                cancelButton: "btn-del me-2",
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
                        url: prefix + "/ajax/" + name + "/" + id,
                        type: "DELETE",
                        success: function (res) {
                            swalWithBootstrapButtons.fire(
                                "Terhapus!",
                                res.message,
                                "success"
                            );
                            $("#" + tableId)
                                .DataTable()
                                .ajax.reload(null, false);
                        },
                        error: function (res) {
                            if (res.status === 500) {
                                if (res.responseJSON?.error) {
                                    showSwal(
                                        "centerOK",
                                        "Error",
                                        "error",
                                        res.responseJSON?.error
                                    );
                                } else {
                                    showSwalErrorSystem();
                                }
                            } else if (res.status === 555) {
                                showSwalConfirmForceDelete(
                                    res.responseJSON?.error,
                                    prefix,
                                    name,
                                    id,
                                    tableId
                                );
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
    };

    showSwalConfirmForceDelete = function (text, prefix, name, id, tableId) {
        "use strict";
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn-main me-2",
                denyButton: "btn-del",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Data tidak bisa dihapus",
                icon: "error",
                text: text,
                showDenyButton: true,
                confirmButtonText: "Hapus Paksa!",
                denyButtonText: `Tidak, Batalkan`,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons
                        .fire({
                            title: "Apakah Anda Yakin Ingin Menghapus Data Secara Paksa?",
                            icon: "error",
                            text: "Semua data yang berhubungan akan ikut terhapus, dan tidak akan bisa dikembalikan!",
                            showDenyButton: true,
                            confirmButtonText: "Ya, Hapus Paksa!",
                            denyButtonText: `Tidak, Batalkan`,
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url:
                                        prefix +
                                        "/ajax/" +
                                        name +
                                        "/" +
                                        id +
                                        "/force",
                                    type: "DELETE",
                                    success: function (res) {
                                        swalWithBootstrapButtons.fire(
                                            "Terhapus!",
                                            res.message,
                                            "success"
                                        );
                                        $("#" + tableId)
                                            .DataTable()
                                            .ajax.reload(null, false);
                                    },
                                    error: function (res) {
                                        if (res.status === 500) {
                                            if (res.responseJSON?.error) {
                                                showSwal(
                                                    "centerOK",
                                                    "Error",
                                                    "error",
                                                    res.responseJSON?.error
                                                );
                                            } else {
                                                showSwalErrorSystem();
                                            }
                                        }
                                    },
                                });
                            } else if (result.isDenied) {
                                swalWithBootstrapButtons.fire(
                                    "Dibatalkan",
                                    "Data anda aman :)",
                                    "error"
                                );
                            }
                        });
                } else if (result.isDenied) {
                    swalWithBootstrapButtons.fire(
                        "Dibatalkan",
                        "Data anda aman :)",
                        "error"
                    );
                }
            });
    };
});
