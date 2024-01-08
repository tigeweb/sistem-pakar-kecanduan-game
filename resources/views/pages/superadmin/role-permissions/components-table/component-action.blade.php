@if (auth()->user()->can(\App\Permissions\Permission::EDIT_ROLE_PERMISSIONS) ||
        auth()->user()->can(\App\Permissions\Permission::DELETE_ROLE_PERMISSIONS))
    @if (!is_role_superadmin($data['role']) && !is_role_teknisi($data['role']) && !is_role_admin_g_induk($data['role']))
        <div class="d-flex justify-content-center gap-2">
            @can(\App\Permissions\Permission::EDIT_ROLE_PERMISSIONS)
                <x-buttons.btn-edit className="action" data-id="{{ $data['role_id'] }}" data-jenis="edit" icon="true" />
            @endcan

            @can(\App\Permissions\Permission::DELETE_ROLE_PERMISSIONS)
                <x-buttons.btn-delete className="action" data-id="{{ $data['role_id'] }}" data-jenis="delete" icon="true" />
            @endcan
        </div>
    @endif
@endif
