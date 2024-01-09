import {
    read,
    store,
    edit_destroy,
} from "../../../components/ajax-functions.js";

$(document).ready(function () {
    const columns = [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            searchable: false,
        },
        {
            data: "kode_gejala",
            name: "kode_gejala",
        },
        {
            data: "kode_jenis",
            name: "kode_jenis",
        },
        {
            data: "deskripsi_gejala",
            name: "deskripsi_gejala",
        },
        {
            data: "aksi",
            name: "aksi",
            orderable: false,
            searchable: false,
        },
    ];

    const columnDefs = [
        {
            targets: [0],
            width: "5%",
            className: "text-center",
        },
        {
            targets: [1],
            width: "50px",
            className: "word-wrap text-center",
        },
        {
            targets: [2],
            width: "50px",
            className: "word-wrap text-center",
        },
        {
            targets: [3],
            width: "200px",
            className: "word-wrap",
        },
        {
            targets: [4],
            width: "13%",
            className: "text-center",
        },
    ];

    const customReset = () => {
        $("#jenis_perilaku_id").select2("destroy");
    };

    read("table-gejala", "/admin/gejala", columns, columnDefs);
    store(
        "table-gejala",
        "modalActionStore",
        "saveBtnStore",
        "formActionStore",
        false,
        customReset
    );
    edit_destroy("gejala", "table-gejala", "/admin");
});

$("#modalActionStore").on("shown.bs.modal", function () {
    $("#jenis_perilaku_id").select2({
        minimumResultsForSearch: Infinity,
        dropdownParent: $("#modalActionStore"),
    });
});
