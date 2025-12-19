<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Dashboard Admin' }}</title>

    <link rel="stylesheet" href="/css/sidebar_admin.css">
    <link rel="stylesheet" href="/css/laporan.css">

    <!-- Tailwind CDN (dipakai untuk utility) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    @include('layouts.sidebar_admin')

    <div class="main-content">

        <!-- HEADER -->
            <div class="content-card" style="margin-bottom:20px;">
                <h2 style="font-weight:700; font-size:22px; margin:0;">
                    Laporan Aktivitas Sistem
                </h2>
                <p style="color:#858585d5;">
                    Ringkasan aktivitas pengguna di KostHub
                </p>
            </div>

            <!-- CARD UTAMA -->
            <div class="activity-wrapper">

                <!-- FILTER -->
                <div class="activity-filter">
                    <select>
                        <option>Maret</option>
                        <option>Februari</option>
                        <option>Januari</option>
                    </select>

                    <select>
                        <option>2025</option>
                        <option>2024</option>
                    </select>
                </div>

                <!-- GRAFIK -->
                <div class="report-chart">
                    <canvas id="chartAktivitas" height="90"></canvas>
                </div>

                <!-- RINGKASAN LAPORAN -->
                <div class="report-summary">

                    <div class="report-box">
                        <div class="activity-icon icon-login">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div>
                            <strong>Login Pengguna</strong>
                            <span>Total login bulan ini</span>
                        </div>
                        <div class="report-value">320</div>
                    </div>

                    <div class="report-box">
                        <div class="activity-icon icon-add">
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <div>
                            <strong>Tambah Kos</strong>
                            <span>Kos baru terdaftar</span>
                        </div>
                        <div class="report-value">45</div>
                    </div>

                    <div class="report-box">
                        <div class="activity-icon icon-favorite">
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div>
                            <strong>Favorit</strong>
                            <span>Kos difavoritkan</span>
                        </div>
                        <div class="report-value">180</div>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('chartAktivitas');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Login', 'Tambah Kos', 'Favorit'],
                    datasets: [{
                        data: [320, 45, 180],
                        backgroundColor: ['#22c55e', '#f97316', '#facc15'],
                        borderRadius: 8
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        </script>
</body>

</html>