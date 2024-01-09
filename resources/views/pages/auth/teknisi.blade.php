<section id="teknisi_login">
    <div class="top-area">
        <img src="{{ get_setting(\App\Enums\SettingEnum::LOGO->value) }}" loading="eager" alt="">
        <h5>{{ get_setting(\App\Enums\SettingEnum::LOGO_TITLE->value) }}</h5>
    </div>
    <img src="{{ asset('assets-mrtui/images/bg_login.png') }}" loading="eager" alt="" class="login-bg">
    <div class="title-area">
        <h5>Selamat Datang👋</h5>
        <p>Silahkan Isi Form di Bawah untuk Masuk ke Halaman Website</p>
    </div>
    @include('pages.auth.form', ['id' => 'teknisi'])
</section>
