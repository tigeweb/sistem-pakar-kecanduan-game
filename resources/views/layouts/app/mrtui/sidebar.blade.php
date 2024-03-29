<section id="sidebar" class="shadow-sm">
    <div class="logo">
        <img src="{{ get_setting(\App\Enums\SettingEnum::LOGO->value) }}" id="logo-sidebar" alt="logo perusahaan">
        <h5 class="logo-title">{{ get_setting(\App\Enums\SettingEnum::LOGO_TITLE->value) }}</h5>
        <div class="logo-mobile">
            <span>P</span>
            <span>K</span>
            <span>R</span>
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
</section>
