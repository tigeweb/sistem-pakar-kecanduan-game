<div class="menu">

    <x-sidebar-menu.single-menu route="admin.dashboard.index" title="Dashboard" icon="bi-grid" />

    {{-- Akses Admin --}}
    <x-sidebar-menu.single-menu route="admin.crud.index" title="CRUD" icon="bi-grid" />
    <x-sidebar-menu.single-menu route="admin.jenis-perilaku.index" title="Jenis Perilaku" icon="bi-grid" />
    {{-- End Akses Admin --}}

    <form class="link-menu" method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="#!" onclick="event.preventDefault(); confirmLogout(this);" class="link-item">
            <i class="bi bi-box-arrow-in-left opacity-50"></i>
            <span class="link-title">Keluar</span>
            <span class="is-active"></span>
        </a>
    </form>
</div>
