    {{-- @php
        cek_notif_admin(auth()->id());
        $notif = get_notif_admin(auth()->id());
    @endphp --}}
    <div class="notif">
        <i class="bi bi-bell-fill"></i>
        {{-- @if (count_notif(auth()->id()) > 0)
            <span class="is-new"></span>
        @endif --}}
        <div class="notif-menu hide">
            <span class="notif-title">Notifikasi</span>
            {{-- @foreach ($notif as $data)
                <span
                    class="notif-item">{{ $data->judul }}<small>{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</small></span>
            @endforeach --}}
        </div>
    </div>

    <div class="profil">
        <a href="" class="profil-user">
            <img src="{{ asset('assets-mrtui/images/user.jpeg') }}" id="profilImageNavbar" class="profil-icon"
                alt="profil-image">
        </a>
    </div>
