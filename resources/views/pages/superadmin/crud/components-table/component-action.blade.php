<x-action-wrapper>

    <x-buttons.btn-detail className="action" data-id="{{ $data->id }}" data-jenis="detail" icon="true" />
    <x-buttons.btn-edit className="action" data-id="{{ $data->id }}" data-jenis="edit" icon="true" />
    <x-buttons.btn-delete className="action" data-id="{{ $data->id }}" data-jenis="delete" icon="true" />

</x-action-wrapper>
