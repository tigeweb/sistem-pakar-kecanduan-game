<x-action-wrapper>

    @can(\App\Permissions\Permission::DETAIL_CRUD)
        <x-buttons.btn-detail className="action" data-id="{{ $data->id }}" data-jenis="detail" icon="true" />
    @endcan

    @can(\App\Permissions\Permission::EDIT_CRUD)
        <x-buttons.btn-edit className="action" data-id="{{ $data->id }}" data-jenis="edit" icon="true" />
    @endcan

    @can(\App\Permissions\Permission::DELETE_CRUD)
        <x-buttons.btn-delete className="action" data-id="{{ $data->id }}" data-jenis="delete" icon="true" />
    @endcan

</x-action-wrapper>
