<section id="sidebar" class="shadow-sm">
    <div class="logo">
        <img src="{{ get_setting(\App\Enums\SettingEnum::LOGO_MRT->value) }}" id="logo-sidebar" alt="logo perusahaan">
        <h5 class="logo-title">{{ get_setting(\App\Enums\SettingEnum::LOGO_TITLE->value) }}</h5>
        <div class="logo-mobile">
            <span>M</span>
            <span>R</span>
            <span>T</span>
        </div>
        <div class="btn-sidebar">
            <div class="toggle open">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    @include('layouts.app.mrtui.sidebar-menu')
    <div class="foto">
        <img src="{{ get_setting(\App\Enums\SettingEnum::GAMBAR_SIDEBAR->value) }}" id="img-sidebar" draggable="false"
            alt="sidebar logo">
    </div>
</section>

{{-- @push('script')
    <script src="{{ asset('assets-mrtui/js/sidebar.js') }}"></script>
@endpush --}}
