<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Dashboard Admin' }}</title>

    <link rel="stylesheet" href="/css/sidebar_admin.css">
    <link rel="stylesheet" href="/css/pengaturan.css">

    <!-- Tailwind CDN (dipakai untuk utility) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    @include('layouts.sidebar_admin')

    <div class="main-content">

        <!-- HEADER -->
        <div class="content-card" style="margin-bottom:20px;">
            <h2 style="font-weight:700; font-size:22px; margin:0;">
                Pengaturan Sistem
            </h2>
            <p style="color:#858585d5;">
                Kelola konfigurasi dan preferensi admin KostHub
            </p>
        </div>

        <!-- MAIN CARD -->
        <div class="activity-wrapper">

            <!-- SECTION: AKUN -->
            <div class="setting-section">
                <h3>Akun Admin</h3>

                <div class="setting-grid">
                    <div class="form-group">
                        <label>Nama Admin</label>
                        <input type="text" value="Fineshyt">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="admin@kosthub.id">
                    </div>

                    <div class="form-group">
                        <label>Password Baru</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" placeholder="Masukkan password baru">
                            <span class="toggle-password" onclick="togglePassword()">👁️</span>
                        </div>
                        <small style="color:#888">
                            Kosongkan jika tidak ingin mengubah password
                        </small>
                    </div>

                </div>
            </div>

            <!-- SECTION: SISTEM -->
            <div class="setting-section">
                <h3>Pengaturan Sistem</h3>

                <div class="setting-row">
                    <span>Mode Maintenance</span>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="setting-row">
                    <span>Auto Verifikasi Kos</span>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="form-group small">
                    <label>Batas Upload Foto Kos</label>
                    <input type="number" value="10">
                </div>
            </div>

            <!-- SECTION: NOTIFIKASI -->
            <div class="setting-section">
                <h3>Notifikasi</h3>

                <div class="setting-row">
                    <span>Email Laporan Masuk</span>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="setting-row">
                    <span>Notifikasi Login Admin</span>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>

            <!-- SECTION: KEAMANAN -->
            <div class="setting-section danger">
                <h3>Keamanan</h3>

                <div class="form-group small">
                    <label>Batas Percobaan Login</label>
                    <input type="number" value="5">
                </div>
            </div>

            <button class="btn-save">Simpan Pengaturan</button>

        </div>

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.querySelector('.toggle-password');

            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = '🙈';
            } else {
                input.type = 'password';
                icon.textContent = '👁️';
            }
        }
    </script>

</body>

</html>