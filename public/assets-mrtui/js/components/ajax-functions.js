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

export { read };
