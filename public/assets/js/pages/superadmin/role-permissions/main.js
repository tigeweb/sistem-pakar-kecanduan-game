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
            data: "permissions",
            name: "permissions",
            render: function (data) {
                let permissions = "";
                data.forEach((permission) => {
                    permissions += `<span class="badge badge-main">${permission}</span> `;
                });
                return permissions;
            },
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
            width: "15%",
            className: "word-wrap",
        },
        {
            targets: [2],
            width: "65%",
            className: "word-wrap",
        },
        {
            targets: [3],
            width: "10%",
            className: "text-center",
        },
    ];

    const customResetStore = () => {
        $("#akses_menu").val("").change();
        $("#role").val("").change();
        $("#izin-akses").html("");
    };

    read("table-role-permissions", "role-permissions", columns, columnDefs);
    store(
        "table-role-permissions",
        "modalActionStore",
        "saveBtnStore",
        "formActionStore",
        false,
        customResetStore
    );
    edit_destroy("role-permissions", "table-role-permissions", "/superadmin");
});
