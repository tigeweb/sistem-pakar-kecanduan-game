<div class="menu">

    <x-sidebar-menu.single-menu route="dashboard.index" title="Dashboard" icon="bi-grid" />

    {{-- Akses Superadmin & Admin --}}
    @if (auth()->user()->can(\App\Permissions\Permission::CAN_ACCESS_SUPERADMIN) ||
            auth()->user()->can(\App\Permissions\Permission::CAN_ACCESS_ADMIN))
        @can(\App\Permissions\Permission::VIEW_CRUD)
            <x-sidebar-menu.single-menu route="crud.index" title="CRUD" icon="bi-grid" />
        @endcan
    @endif
    {{-- End Akses Superadmin & Admin --}}

    {{-- Akses Superadmin --}}

    {{-- Kelola Pengguna --}}
    @can(\App\Permissions\Permission::CAN_ACCESS_SUPERADMIN)
        @if (auth()->user()->can(\App\Permissions\Permission::VIEW_ROLES) ||
                auth()->user()->can(\App\Permissions\Permission::VIEW_ROLE_PERMISSIONS))
            @php
                $dropdownMenu = [];
            @endphp
            @can(\App\Permissions\Permission::VIEW_ROLES)
                @php
                    $dropdownMenu[] = [
                        'route' => 'superadmin.kelola-pengguna.roles.index',
                        'title' => 'Role',
                    ];
                @endphp
            @endcan
            @can(\App\Permissions\Permission::VIEW_ROLE_PERMISSIONS)
                @php
                    $dropdownMenu[] = [
                        'route' => 'superadmin.kelola-pengguna.role-permissions.index',
                        'title' => 'Izin Akses',
                    ];
                @endphp
            @endcan
            <x-sidebar-menu.dropdown-menu mainRoute="superadmin.kelola-pengguna" mainTitle="Kelola Pengguna" :dropdownMenu="$dropdownMenu"
                icon="bi-people" />
        @endif
    @endcan
    {{-- End Kelola Pengguna --}}

    {{-- End Akses Superadmin --}}

    <form class="link-menu" method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="#!" onclick="event.preventDefault(); confirmLogout(this);" class="link-item">
            <i class="bi bi-box-arrow-in-left opacity-50"></i>
            <span class="link-title">Keluar</span>
            <span class="is-active"></span>
        </a>
    </form>
</div>
