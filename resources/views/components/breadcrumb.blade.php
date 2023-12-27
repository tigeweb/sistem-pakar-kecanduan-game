{{--

    Single breadcrumb
    <x-breadcrumb :items="[
        ['text' => 'Property', 'link' => null],
    ]"/>

    Double breadcrumb
    <x-breadcrumb :items="[
        ['text' => 'Property', 'link' => route('property.index')],
        ['text' => 'Add Property', 'link' => null],
    ]"/>

    Triple breadcrumb
    <x-breadcrumb :items="[
        ['text' => 'Property', 'link' => route('property.index')],
        ['text' => 'Add Property', 'link' => route('property.create')],
        ['text' => 'Another Page', 'link' => null],
    ]"/>

--}}

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($items as $index => $item)
            @if ($item['link'])
                <li class="breadcrumb-item"><a href="{{ $item['link'] }}">{{ $item['text'] }}</a></li>
            @else
                @if ($index === count($items) - 1)
                    <li class="breadcrumb-item active" aria-current="page">{{ $item['text'] }}</li>
                @else
                    <li class="breadcrumb-item">{{ $item['text'] }}</li>
                @endif
            @endif
        @endforeach
    </ol>
</nav>
