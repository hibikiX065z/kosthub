<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Dashboard Admin' }}</title>

    <!-- Tailwind CDN (dipakai untuk utility) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* warna oranye utama sesuai desain */
        :root{
            --orange: #F47A1F;
            --sidebar-bg: var(--orange);
            --card-bg: #ffffff;
            --muted: #8a8a8a;
            --soft-shadow: 0 6px 12px rgba(0,0,0,0.08);
            --round: 14px;
        }

        body { font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background: #f6f6f6; }

        /* Sidebar */
        .admin-sidebar {
            background: var(--sidebar-bg);
            position: relative;
            width: 260px;
            min-width: 260px;
            color: #fff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 6px 0 10px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            position: relative;
            top: 30px;
            padding: 0px;
        }

        .sidebar-logo img {
            width: 180px;
            height: auto;
        }

        .sidebar-profile {
            display: flex;
            align-items: center;
            padding: 24px 12px 8px 8px;
        }

        .profile-logo {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .sidebar-menu-item {
            display: flex;
            align-items: center;
            padding: 10px 30px;
            gap: 14px;
            text-decoration: none;
            color: white;
            transition: 0.25s ease;
        }

        .sidebar-menu-item .icon {
            width: 19px;
            height: 20px;
        }

        .sidebar-menu-item:hover {
            background: rgba(255, 255, 255, 0.219);
        }

        .sidebar-menu-item span {
            margin-left: 25px;
        }

        .sidebar-logout {
            position: absolute;
            left: 0;
            width: 100%;
            display: flex;
            align-items: center;
            padding: 12px 28px; 
            gap: 18px;
            bottom: 0;
            margin-bottom: 20px;
            text-decoration: none;
            color: white;
            box-sizing: border-box;
            transition: 0.25s ease;
        }

        .sidebar-logout .icon {
            width: 25px;
            height: 25px;
        }

        .sidebar-logout span {
            margin-left: 17px;
        }
        
        .sidebar-logout:hover {
            background: rgba(255, 255, 255, 0.219);
        }

        /* main area */
        .main-area { margin-left:260px; padding:0px 0px; min-height:100vh; }

        .page {
            padding: 20px 40px;  /* jarak kiri kanan */
        }

        /* top header */
        .header-top {
            background: var(--orange);
            color: #fff;
            padding:18px 40px;
            margin-bottom:12px;
            box-shadow: 0 6px 10px rgba(0,0,0,0.06);
        }
        .header-top h1 { font-size:26px; font-weight:700; }

        /* stat cards */
        .stat-card {
            background: var(--card-bg);
            border-radius: 14px;
            padding:20px;
            box-shadow: var(--soft-shadow);
            border: 1px solid rgba(0,0,0,0.03);
            text-align:center;
        }
        .stat-card .icon-wrap { width:28px; height:28px; margin:0 auto 10px; display:flex; align-items:center; justify-content:center; border-radius:20px; background:transparent; }
        .stat-card .label { font-weight:600; color:#222; font-size:16px; }
        .stat-card .value { font-weight:800; font-size:32px; margin-top:8px; }

        .picture {
            width: 27px;
            height: 27px;
            filter: brightness(0);
        }

        /* big content cards */
        .content-card {
            background:var(--card-bg);
            border-radius: 16px;
            padding:20px;
            box-shadow: var(--soft-shadow);
            border: 1px solid rgba(0,0,0,0.01);
        }

        /* two columns below */
        .two-col { display:grid; grid-template-columns: 1fr 295px; gap:24px; margin-top:28px; align-items:start; font-size:16px; }

        /* list bullets small */
        .bullet { width:10px; height:10px; background:#bdbcbc; border-radius:999px; display:inline-block; margin-right:10px; }

        /* table simple */
        table.activity-table { width:100%; border-collapse:collapse; }
        table.activity-table th { text-align:left; padding:10px 60px; color:#333; font-weight:700; font-size:16px; }
        table.activity-table td { padding:80px 8px; color:#444; font-size:16px; border-top:1px solid rgba(0,0,0,0.03); }

        /* responsive */
        @media (max-width: 900px){
            .admin-sidebar{ width:72px; min-width:72px; }
            .main-area{ margin-left:72px; padding:20px; }
            .two-col { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="admin-sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('img/admin/logohitam.png') }}" alt="Kosthub logo">
        </div>

        <div class="sidebar-profile">
            <div style="padding:18px 10px; display:flex; gap:12px; align-items:center;">
                <div class="sidebar-profile">
                    <img src="{{ asset('img/admin/profil.png') }}" class="profile-logo" alt="Profil logo">
                </div>

                <div>
                    <div style="font-size:18px; font-weight:600; opacity:0.9;">{{ auth()->check() ? auth()->user()->name : 'Fineshyt' }}</div>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">  
            <a href="{{ route('dashboard.admin') }}" class="sidebar-menu-item">
                <img src="{{ asset('img/admin/dashboard.png') }}"class="icon" alt="dashboard">
                <span style="font-weight:600; font-size:18px;">Dashboard</span>
            </a>

            <a href="#" class="sidebar-menu-item">
                <img src="{{ asset('img/admin/pengguna.png') }}" class="icon" alt="pengguna">
                <span style="font-weight:600; font-size:18px;">Pengguna</span>
            </a>

            <a href="#" class="sidebar-menu-item">
                <img src="{{ asset('img/admin/kos.png') }}" class="icon" alt="kos">
                <span style="font-weight:600; font-size:18px;">Data Kost</span>
            </a>

            <a href="#" class="sidebar-menu-item">
                <img src="{{ asset('img/admin/laporan.png') }}" class="icon" alt="dashboard">
                <span style="font-weight:600; font-size:18px;">Laporan</span>
            </a>

            <a href="#" class="sidebar-menu-item">
                <img src="{{ asset('img/admin/aktivitas.png') }}" class="icon" alt="aktivitas">
                <span style="font-weight:600; font-size:18px;">Aktivitas</span>
            </a>

            <a href="#" class="sidebar-menu-item">
                <img src="{{ asset('img/admin/pengaturan.png') }}" class="icon" alt="pengaturan">
                <span style="font-weight:600; font-size:18px;">Pengaturan</span>
            </a>
        </div> 

        <div class="sidebar-logout">
            <a href="{{ url('/logout') }}" class="sidebar-logout" style="color:#fff;">
                <img src="{{ asset('img/admin/logout.png') }}" class="icon" alt="logout">
                <span style="font-weight:700; font-size:18px; ;">Logout</span>
            </a>
        </div>
    </div>

    <div class="main-area">
        <!-- top orange header (full width inside content) -->
        <div class="header-top">
            <h1>Selamat Datang {{ auth()->check() ? auth()->user()->name : 'Fineshyt' }}</h1>
        </div>

        <!-- stats row -->
        <div class="page">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="stat-card">
                <div class="icon-wrap">
                    <img src="{{ asset('img/admin/pengguna.png') }}" class="picture" alt="pengguna">
                </div>
                <div class="label">Jumlah Pengguna</div>
                <div class="value">{{ number_format($jumlahPengguna ?? 0,0,',','.') }}</div>
            </div>

            <div class="stat-card">
                <div class="icon-wrap">
                    <img src="{{ asset('img/admin/kos.png') }}" class="picture" alt="kos">
                </div>
                <div class="label">Kos aktif</div>
                <div class="value">{{ number_format($kosAktif ?? 0,0,',','.') }}</div>
            </div>

            <div class="stat-card">
                <div class="icon-wrap">
                    <img src="{{ asset('img/admin/aktivitas.png') }}" class="picture" alt="aktivitas">
                </div>
                <div class="label">Jumlah Verifikasi</div>
                <div class="value">{{ number_format($jumlahVerifikasi ?? 0,0,',','.') }}</div>
            </div>
        </div>

        <!-- lower content: aktivitas + tindakan -->
        <div class="two-col">
            <div class="content-card">
                <h3 style="font-weight:700; margin-bottom:18px;">Aktivitas terbaru</h3>

                <table class="activity-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Aktivitas</th>
                            <th>Pengguna</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aktivitas as $act)
                            <tr>
                                <td>{{ $act->created_at->format('d M Y') }}</td>
                                <td>{{ $act->kegiatan }}</td>
                                <td>{{ '@'.$act->user->username ?? '@'.$act->user->name ?? '—' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-6 text-center text-gray-500">Belum ada aktivitas tercatat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="content-card">
                <h3 style="font-weight:700; margin-bottom:14px;">Perlu tindakan hari ini</h3>

                <ul style="list-style:none; padding-left:0; color:#444;">
                    <li class="mb-3"><span class="bullet"></span> {{ $menungguVerifikasi ?? 0 }} Kos belum diverifikasi</li>
                    <li><span class="bullet"></span> {{ $pendingReports ?? 0 }} Laporan belum direspon</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
