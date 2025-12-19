<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Dashboard Admin' }}</title>

    <link rel="stylesheet" href="/css/sidebar_admin.css">
    <link rel="stylesheet" href="/css/aktivitas.css">


    <!-- Tailwind CDN (dipakai untuk utility) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    @include('layouts.sidebar_admin')

    <div class="main-content">

        <!-- HEADER -->
        <div class="content-card" style="margin-bottom:20px;">
                <h2 style="font-weight:700; font-size:22px; margin:0;">
                    Aktivitas Sistem
                </h2>
                <p style="color:#858585d5;">
                    Menampilkan riwayat aktivitas pengguna di KostHub
                </p>
            </div>

        <!-- SUMMARY -->
        <div class="activity-summary">
            <div class="summary-box">
                <div class="summary-icon icon-login">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="summary-text">
                    <h3>45</h3>
                    <span>Login</span>
                </div>
            </div>

            <div class="summary-box">
                <div class="summary-icon icon-kost">
                    <i class="fa-solid fa-house"></i>
                </div>
                <div class="summary-text">
                    <h3>6</h3>
                    <span>Kos Baru</span>
                </div>
            </div>

            <div class="summary-box">
                <div class="summary-icon icon-fav">
                    <i class="fa-solid fa-star"></i>
                </div>
                <div class="summary-text">
                    <h3>18</h3>
                    <span>Favorit</span>
                </div>
            </div>
        </div>

        <div class="activity-wrapper">

            <!-- FILTER -->
            <div class="activity-filter">
                <select>
                    <option>Semua Aktivitas</option>
                    <option>Login</option>
                    <option>Tambah Kos</option>
                    <option>Favorit</option>
                </select>

                <select>
                    <option>Semua Peran</option>
                    <option>Pencari Kos</option>
                    <option>Pemilik Kos</option>
                </select>

                <select>
                    <option>Hari Ini</option>
                    <option>7 Hari Terakhir</option>
                    <option>30 Hari Terakhir</option>
                </select>

                <input type="text" placeholder="Cari aktivitas...">
            </div>

            <!-- LIST -->
                <div class="activity-item">
                    <div class="activity-icon icon-add">
                        <i class="fa-solid fa-house"></i>
                    </div>
                    <div class="activity-info">
                        <strong>Budi Santoso</strong>
                        <span class="role-badge role-pemilik">Pemilik Kos</span>
                        <p>Menambahkan kos <b>Kost Melati Indah</b></p>
                    </div>
                    <div class="activity-time">11 Maret 2025 · 08:45</div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon icon-favorite">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="activity-info">
                        <strong>Sahadewa Arya</strong>
                        <span class="role-badge role-pencari">Pencari Kos</span>
                        <p>Menambahkan kos <b>Kost Putri Mawar</b> ke favorit</p>
                    </div>
                    <div class="activity-time">10 Maret 2025 · 22:10</div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon icon-edit">
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    <div class="activity-info">
                        <strong>Rina Lestari</strong>
                        <span class="role-badge role-pemilik">Pemilik Kos</span>
                        <p>Memperbarui data profil</p>
                    </div>
                    <div class="activity-time">10 Maret 2025 · 19:02</div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>