<div class="row" id="hasil">
    <h4 class="text-center fw-bolder text-{{ $color }}">{{ $kecanduan }}</h4>
    <div>
        @if (count($data) > 0)
            <h5 class="mb-2">Gejala: </h5>
            <ul>
                @foreach ($data as $item)
                    <li>- <i>{{ $item['nama_jenis'] }}</i></li>
                @endforeach
            </ul>
        @else
            <h5 class="mb-2">Gejala: -</h5>
        @endif
    </div>
    <div class="mb-5">
        @if (count($data) > 0)
            <h5 class="mb-2">Solusi: </h5>
            @foreach ($data as $item)
                <p class="fw-bold mb-0"><i>{{ $item['nama_jenis'] }}</i></p>
                <p class="mb-0">{{ $item['solusi'] }}</p>
                <p class="fw-lighter">{{ $item['keterangan_solusi'] }}</p>
            @endforeach
        @else
            <h5 class="mb-2">Solusi: -</h5>
        @endif
    </div>
    <button type="button" hx-post="{{ route('diagnosa.get_data') }}" hx-target="#hasil" hx-swap="innerHTML"
        hx-disabled-elt="#isiLagi" id="isiLagi" class="waves-effect waves-light btn-large">
        Isi Form Baru
    </button>
</div>
<script>
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
    $('#isiLagi').on('htmx:configRequest', function(e) {
        e.detail.parameters['_token'] = '{{ csrf_token() }}';
    })
</script>
