@extends('layouts.app.mrtui.app')
@section('title')
    <h3>CRUD</h3>
    <x-breadcrumb :items="[['text' => 'CRUD', 'link' => null]]" />
@endsection
@section('contents')
    <section class="menu-section mt-4">
        <x-table id="table-crud" :headers="['no', 'string', 'created at', 'aksi']" />
    </section>
@endsection

<x-assets.datatable />
<x-assets.select />

@push('script')
    <script>
        $(document).ready(function() {
            read(
                "table-crud",
                "{{ route('crud.index') }}",
                columns,
                columnDefs
            );
        });

        const columns = [{
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

        const columnDefs = [{
                targets: [0],
                width: "25px",
                className: "text-center",
            },
            {
                targets: [1],
                width: "220px",
                className: "word-wrap",
            },
            {
                targets: [2],
                width: "120px",
                className: "word-wrap text-center",
            },
            {
                targets: [3],
                width: "100px",
                className: "text-center",
            },
        ];

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
                    data: function(d) {
                        if (Object.keys(additionalData).length > 0) {
                            $.extend(d, additionalData);
                        }
                    },
                    error: function(res) {
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
                $("#" + selectId).on("change", function() {
                    updateAdditionalData();
                    table.draw();
                });
            });
        }
    </script>
@endpush
