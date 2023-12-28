{{--
    <x-sidebar-menu.single-menu route="dashboard.index" title="Dashboard" icon="bi-grid" />
--}}

@props(['route', 'title', 'icon'])

<div class="link-menu {{ request()->routeIs($route . '*') ? 'active' : ' ' }}">
    <a href="{{ route($route) }}" class="link-item">
        <i class="bi {{ $icon }}{{ request()->routeIs($route . '*') ? ' opacity-100' : ' opacity-50' }}"></i>
        <span class="link-title">{{ $title }}</span>
        <span class="is-active"></span>
    </a>
</div>
{{-- <div class="link-menu {{ request()->routeIs($route . '*') ? 'active' : '' }}">
    <a href="{{ route($route) }}" class="link-item">
        <i class="bi {{ $icon }}{{ request()->routeIs($route . '*') ? '-fill' : '' }}"></i>
        <span class="link-title">{{ $title }}</span>
        <span class="is-active"></span>
    </a>
</div> --}}
