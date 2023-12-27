<footer id="footer">
    <p class="text-muted mb-1 mb-md-0">Copyright © {{ date('Y') }} - 2023 <span
            id="val-copyright">{{ get_setting(\App\Enums\SettingEnum::COPYRIGHT->value) }}</span>.</p>
    <p class="text-muted text-end {{ get_setting(\App\Enums\SettingEnum::LISENSI->value) == '0' ? 'd-none' : '' }}"
        id="val-lisensi">Dibuat oleh <a target="_blank"
            href="{{ get_setting(\App\Enums\SettingEnum::LISENSI_LINK->value) }}">{{ get_setting(\App\Enums\SettingEnum::LISENSI_NAME->value) }}</a>
    </p>
</footer>
