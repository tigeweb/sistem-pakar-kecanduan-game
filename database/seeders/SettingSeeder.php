<?php

namespace Database\Seeders;

use App\Enums\SettingEnum;
use App\Models\Superadmin\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'tipe' => SettingEnum::COPYRIGHT->value,
            'value' => "client"
        ]);
        Setting::create([
            'tipe' => SettingEnum::LOGO_TITLE->value,
            'value' => "Sistem Pakar"
        ]);
        Setting::create([
            'tipe' => SettingEnum::LOGO->value,
            'value' => "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMTQuMDkgMzE0LjA5Ij48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2FmOGVjMTt9LmNscy0ye2ZpbGw6bm9uZTt9PC9zdHlsZT48L2RlZnM+PGcgaWQ9IkxpdmVsbG9fMiIgZGF0YS1uYW1lPSJMaXZlbGxvIDIiPjxnIGlkPSJMaXZlbGxvXzEwIiBkYXRhLW5hbWU9IkxpdmVsbG8gMTAiPjxwYXRoIGNsYXNzPSJjbHMtMSIgZD0iTTI3MCwyMTcuMzhsMCwwYTEyNy40NywxMjcuNDcsMCwwLDEtMTYwLjQ5LDU3LjUzYy43Ny4wNSw0My42LDIuOTMsNTcuNzgtNy44NywwLDAtNjkuNS04LjE4LTY4LjQ3LTgzLjQ2LDAsMCw4LjUxLDE0LjY0LDIzLjg0LDE0LjY0czI1Ljg5LTE4LjM5LDI1Ljg5LTM2LjQ1LTIxLjQ2LTQxLjIyLTQ1LjY1LTQxLjIyUzM4LjYxLDE0MS4wOCw0Ny43OCwyMjEuMDdBMTI3LjM5LDEyNy4zOSwwLDAsMSw4MC4yMSw1Ni4xMkM3OS4yNiw1Ny41NCw1NS44Myw5Mi41MSw1OCwxMTBjMCwwLDQyLTU2LDEwNi41Ny0xNy4yOCwwLDAtMTcsMC0yNC42NSwxMy4yNnMyLjksMzEuNjIsMTguNTEsNDAuNjksNDYuNDMsMi4xNSw1OC41OC0xOC43NlMyMzEuNTcsNjIsMTU3LjgxLDI5LjcxaC4wNUExMjcuMzYsMTI3LjM2LDAsMCwxLDI4My41NSwxMzYuNThjLS42Mi0xLjE3LTIwLjM5LTM4LjcxLTM2LjktNDUuMS40Mi45MywyOC44OCw2My43OS0zNS4zNCwxMDIsMCwwLDgtMTQuOTIsMC0yOHMtMjkuMjItMTIuNDUtNDQuNjEtMy0yMy45LDM5Ljg1LTExLjI2LDYwLjQ3UzIwNi42MSwyNjcsMjcwLDIxNy4zOFoiLz48cmVjdCBjbGFzcz0iY2xzLTIiIHdpZHRoPSIzMTQuMDkiIGhlaWdodD0iMzE0LjA5Ii8+PC9nPjwvZz48L3N2Zz4="
        ]);
    }
}
