<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Dashboard Admin' }}</title>

    <link rel="stylesheet" href="/css/sidebar_admin.css">

    <!-- Tailwind CDN (dipakai untuk utility) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    @include('layouts.sidebar_admin')

    <!-- stats row -->
    <div class="page">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="stat-card">
                <div class="icon-wrap">
                    <img src="/img/admin/pengguna-aktif.png" class="picture" alt="pengguna">
                </div>
                <div class="label">Jumlah Pengguna</div>
                <div class="value">128</div>
            </div>

            <div class="stat-card">
                <div class="icon-wrap">
                    <img src="/img/admin/kos-aktif.png" class="picture" alt="kos">
                </div>
                <div class="label">Kos Aktif</div>
                <div class="value">42</div>
            </div>

            <div class="stat-card">
                <div class="icon-wrap">
                    <img src="/img/admin/aktivitas-aktif.png" class="picture" alt="aktivitas">
                </div>
                <div class="label">Jumlah Verifikasi</div>
                <div class="value">19</div>
            </div>

        </div>

        <!-- BAWAH -->
        <div class="two-col">

            <!-- AKTIVITAS -->
            <div class="content-card">
                <div class="activity-section-bg">
                    <h3 style="font-weight:700; color:#fff;">Aktivitas Terbaru</h3>
                </div>

                <div style="overflow-y:auto; max-height:240px;">
                    <table class="activity-table">
                        <thead>
                            <tr>
                                <th class="col-tanggal">Tanggal</th>
                                <th class="col-aktivitas">Aktivitas</th>
                                <th class="col-pengguna">Pengguna</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>19 Mar 2025</td>
                                <td>Login ke sistem</td>
                                <td>@admin</td>
                            </tr>
                            <tr>
                                <td>18 Mar 2025</td>
                                <td>Verifikasi kos Kost Melati</td>
                                <td>@budi</td>
                            </tr>
                            <tr>
                                <td>18 Mar 2025</td>
                                <td>Tambah kos baru</td>
                                <td>@rina</td>
                            </tr>
                            <tr>
                                <td>17 Mar 2025</td>
                                <td>Login ke sistem</td>
                                <td>@andika</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- PERLU TINDAKAN -->
            <div class="content-card">
                <div class="activity-section-bg">
                    <h3 style="font-weight:700; color:#fff;">Perlu Tindakan Hari Ini</h3>
                </div>

                <ul style="list-style:none; padding:16px 10px; color:#444;">
                    <li class="mb-3">
                        <span class="bullet"></span>
                        5 Kos belum diverifikasi
                    </li>
                    <li>
                        <span class="bullet"></span>
                        2 Aktivitas terbaru
                    </li>
                </ul>
            </div>

        </div>

    </div>

</body>

</html>