<div class="row">
    <h4>Hasil: {{ $kecanduan }}</h4>
    <div>
        <h5>Gejala: </h5>
        <ul>
            @foreach ($data as $item)
                <li>{{ $item['nama_jenis'] }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <h5>Solusi: </h5>
        @foreach ($data as $item)
            <p class="fw-bold">{{ $item['nama_jenis'] }}</p>
            <p>{{ $item['solusi'] }}</p>
            <p class="fw-lighter">{{ $item['keterangan_solusi'] }}</p>
        @endforeach
    </div>
</div>
