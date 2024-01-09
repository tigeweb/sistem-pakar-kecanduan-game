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
            data: "kode_jenis",
            name: "kode_jenis",
        },
        {
            data: "nama_jenis",
            name: "nama_jenis",
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
            width: "100px",
            className: "word-wrap",
        },
        {
            targets: [2],
            width: "100px",
            className: "word-wrap",
        },
        {
            targets: [3],
            width: "13%",
            className: "text-center",
        },
    ];

    read("table-jenis-perilaku", "/admin/jenis-perilaku", columns, columnDefs);
    store("table-jenis-perilaku");
    edit_destroy("jenis-perilaku", "table-jenis-perilaku", "/admin");
});
