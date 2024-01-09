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
