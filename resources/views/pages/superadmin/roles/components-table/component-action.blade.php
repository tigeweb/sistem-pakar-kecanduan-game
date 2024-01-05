@if (!is_role_superadmin($data->name))
    <x-action-wrapper>
        @can(\App\Permissions\Permission::EDIT_ROLES)
            <x-buttons.btn-edit className="action" data-id="{{ $data->id }}" data-jenis="edit" icon="true" />
        @endcan

        @can(\App\Permissions\Permission::DELETE_ROLES)
            <x-buttons.btn-delete className="action" data-id="{{ $data->id }}" data-jenis="delete" icon="true" />
        @endcan
    </x-action-wrapper>
@endif
