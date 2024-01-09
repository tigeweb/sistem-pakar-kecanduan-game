<div class="menu">

    <x-sidebar-menu.single-menu route="admin.dashboard.index" title="Dashboard" icon="bi-grid" />

    {{-- Akses Admin --}}
    <x-sidebar-menu.single-menu route="admin.jenis-perilaku.index" title="Jenis Perilaku" icon="bi-question-square" />
    <x-sidebar-menu.single-menu route="admin.gejala.index" title="Gejala" icon="bi-activity" />
    {{-- End Akses Admin --}}

    <x-sidebar-menu.single-menu route="diagnosa.index" title="Diagnosa" icon="bi-clipboard-check" />

    <form class="link-menu" method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="#!" onclick="event.preventDefault(); confirmLogout(this);" class="link-item">
            <i class="bi bi-box-arrow-in-left opacity-50"></i>
            <span class="link-title">Keluar</span>
            <span class="is-active"></span>
        </a>
    </form>
</div>
