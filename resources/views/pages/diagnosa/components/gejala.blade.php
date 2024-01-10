@foreach ($deskripsi_gejala as $q)
    <x-main.user-forms.radio-gejala name="gejala[{{ $q->id }}]" id="{{ $q->id }}">
        {{ $loop->iteration }}. {{ $q->deskripsi_gejala }}
    </x-main.user-forms.radio-gejala>
@endforeach
