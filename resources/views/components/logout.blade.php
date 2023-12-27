<script>
    function confirmLogout(link) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn-main",
                cancelButton: "btn-del me-2",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Apakah kamu yakin ingin keluar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: "me-2",
                confirmButtonText: "Ya, lanjutkan!",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.value) {
                    link.closest('form').submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        "Dibatalkan",
                        "Terima Kasih :)",
                        "error"
                    );
                }
            });
    }
</script>
