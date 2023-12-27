<section id="navbar-admin">
    <div class="title">
        @yield('title')
    </div>
    <div class="toggle" style="display: none">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="ms-auto d-flex align-items-center">
        @include('layouts.app.mrtui.navbar-item')
    </div>
</section>
<div class="title-mobile" style="display: none">
    @yield('title')
</div>
