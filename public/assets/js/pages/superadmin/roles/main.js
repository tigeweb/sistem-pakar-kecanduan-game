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
            data: "role",
            name: "role",
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
            className: "word-wrap",
        },
        {
            targets: [2],
            width: "13%",
            className: "text-center",
        },
    ];

    read("table-roles", "roles", columns, columnDefs);
    store("table-roles");
    edit_destroy("roles", "table-roles", "/superadmin");
});
