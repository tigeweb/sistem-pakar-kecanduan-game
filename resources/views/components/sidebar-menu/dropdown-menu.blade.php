{{--
    @php
        $dropdownMenu = [
            [
                'route' => 'dashboard.index',
                'title' => 'Dashboard item 1',
            ],
            [
                'route' => 'dashboard.index',
                'title' => 'Dashboard item 2',
            ],
        ];
    @endphp
    <x-sidebar-menu.dropdown-menu mainRoute="admin.dashboard" mainTitle="Dashboard" :dropdownMenu="$dropdownMenu" icon="bi-layers" />
--}}

@props(['mainRoute', 'mainTitle', 'dropdownMenu' => [], 'icon'])

<div class="link-menu dropdown {{ request()->routeIs($mainRoute . '*') ? 'active' : '' }}">
    <a href="#!" class="link-item">
        <i class="bi {{ $icon }} {{ request()->routeIs($mainRoute . '*') ? 'opacity-100' : 'opacity-50' }}"></i>
        <span class="link-title">{{ $mainTitle }}</span>
        <span class="is-active"></span>
        <span class="arrow {{ request()->routeIs($mainRoute . '*') ? 'rotate' : '' }}">></i></span>
    </a>
    <div class="dropdown-menu {{ request()->routeIs($mainRoute . '*') ? 'show' : 'hide' }}">
        @foreach ($dropdownMenu as $item)
            <a href="{{ route($item['route']) }}"
                class="dropdown-item {{ request()->routeIs($item['route']) ? 'active' : '' }}">{{ $item['title'] }}</a>
        @endforeach
    </div>
</div>
