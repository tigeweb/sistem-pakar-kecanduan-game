<section id="admin_login">
    <img src="{{ asset('assets-mrtui/images/bg_login.png') }}" class="bg" alt="">
    <div class="card-login">
        <div class="card-logo">
            <img src="{{ get_setting(\App\Enums\SettingEnum::LOGO->value) }}" alt="">
            <h5>{{ get_setting(\App\Enums\SettingEnum::LOGO_TITLE->value) }}</h5>
        </div>
        <div class="card-title">
            <h5>Selamat Datang👋</h5>
            <p>Silahkan Isi Form di Bawah untuk Masuk ke Halaman Website</p>
        </div>
        @include('pages.auth.form', ['id' => 'admin'])
    </div>
</section>
