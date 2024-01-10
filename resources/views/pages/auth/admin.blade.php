<section id="admin_login">
    <div class="card-login">
        <div class="card-logo">
            <img src="{{ get_setting(\App\Enums\SettingEnum::LOGO->value) }}" alt="">
            <h5>{{ get_setting(\App\Enums\SettingEnum::LOGO_TITLE->value) }}</h5>
        </div>
        @include('pages.auth.form', ['id' => 'admin'])
    </div>
</section>
