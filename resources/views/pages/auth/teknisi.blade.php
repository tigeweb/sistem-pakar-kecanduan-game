<section id="teknisi_login">
    <div class="top-area mb-3">
        <img src="{{ get_setting(\App\Enums\SettingEnum::LOGO->value) }}" loading="eager" alt="">
        <h5>{{ get_setting(\App\Enums\SettingEnum::LOGO_TITLE->value) }}</h5>
    </div>
    @include('pages.auth.form', ['id' => 'teknisi'])
</section>
