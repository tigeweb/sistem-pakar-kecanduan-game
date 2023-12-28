{{--
    <x-table id="table-data-master-barang" :headers="['no', 'tanggal pembuatan data', 'nama barang / spare part', 'nomor barang', 'stn', 'harga satuan', 'gudang', 'koordinat', 'aksi']" />

    <x-table id="table-periksa-barang"
        :headers="[
            '',
            'no',
            'nama barang / spare part',
            'nomor barang',
            'jumlah',
            'stn',
            'jumlah uang',
            'kondisi barang',
            'kategori barang',
            'status',
            'aksi',
        ]"
        :headerClasses="[0 => 'select-checkbox']"
    />
--}}

@props(['id', 'headers' => [], 'headerClasses' => []])

<div class="datatable">
    <table id="{{ $id }}" class="table-striped row-border">
        <thead>
            <tr class="text-capitalize">
                @foreach ($headers as $index => $header)
                    @php
                        $classes = isset($headerClasses[$index]) ? ' ' . $headerClasses[$index] : '';
                    @endphp
                    <th class="text-center{{ $classes }}">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
    </table>
</div>
