<section id="teknisi_login">
    <div class="top-area">
        <img src="{{ asset('assets/image/logo_mrt.png') }}" loading="eager" alt="">
        <h5>Material Return Terpadu</h5>
    </div>
    <img src="{{ asset('assets/image/bg_login.png') }}" loading="eager" alt="" class="login-bg">
    <div class="title-area">
        <h5>Selamat Datang👋</h5>
        <p>Silahkan Isi Form di Bawah untuk Masuk ke Halaman Website</p>
    </div>
    @include('pages.auth.form', ['id' => 'teknisi'])
</section>
