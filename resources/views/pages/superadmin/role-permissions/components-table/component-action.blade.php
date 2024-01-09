@if (!is_role_superadmin($data['role']))
    <x-action-wrapper>
        @can(\App\Permissions\Permission::EDIT_ROLE_PERMISSIONS)
            <x-buttons.btn-edit className="action" data-id="{{ $data['role_id'] }}" data-jenis="edit" icon="true" />
        @endcan

        @can(\App\Permissions\Permission::DELETE_ROLE_PERMISSIONS)
            <x-buttons.btn-delete className="action" data-id="{{ $data['role_id'] }}" data-jenis="delete" icon="true" />
        @endcan
    </x-action-wrapper>
@endif
