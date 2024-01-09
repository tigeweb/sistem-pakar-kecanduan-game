<div class="menu">

    <x-sidebar-menu.single-menu route="admin.dashboard.index" title="Dashboard" icon="bi-grid" />

    {{-- Akses Superadmin & Admin --}}
    <x-sidebar-menu.single-menu route="admin.crud.index" title="CRUD" icon="bi-grid" />
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
