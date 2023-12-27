<section id="admin_login">
    <img src="{{ asset('assets/image/bg_login.png') }}" class="bg" alt="">
    <div class="card-login">
        <div class="card-logo">
            <img src="{{ asset('assets/image/logo_mrt.png') }}" alt="">
            <h5>Material Return Terpadu</h5>
        </div>
        <div class="card-title">
            <h5>Selamat Datang👋</h5>
            <p>Silahkan Isi Form di Bawah untuk Masuk ke Halaman Website</p>
        </div>
        @include('pages.auth.form', ['id' => 'admin'])
    </div>
</section>
