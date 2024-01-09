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
            data: "string",
            name: "string",
        },
        {
            data: "created_at",
            name: "created_at",
            searchable: false,
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
            width: "230px",
            className: "word-wrap",
        },
        {
            targets: [2],
            width: "120px",
            className: "word-wrap text-center",
        },
        {
            targets: [3],
            width: "13%",
            className: "text-center",
        },
    ];

    read("table-crud", "/admin/crud", columns, columnDefs);
    store("table-crud");
    edit_destroy("crud", "table-crud", "/admin");
});
