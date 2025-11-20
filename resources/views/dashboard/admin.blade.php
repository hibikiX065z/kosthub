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
            padding: 14px 28px; 
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
        
        .sidebar-logout a:hover {
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
        .stat-card .icon-wrap { width:38px; height:38px; margin:0 auto 10px; display:flex; align-items:center; justify-content:center; border-radius:20px; background:transparent; }
        .stat-card .label { font-weight:600; color:#222; font-size:16px; }
        .stat-card .value { font-weight:800; font-size:32px; margin-top:8px; }

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
        table.activity-table th { text-align:left; padding:13px 25px; color:#333; font-weight:700; font-size:16px; }
        table.activity-table td { padding:18px 20px; color:#444; font-size:16px; border-top:1px solid rgba(0,0,0,0.03); }
        
        .activity-section-bg {
            background: var(--orange);
            color: #F47A1F;
            padding: 10px 10px;
            border-radius: 12px 12px 0 0;
        }

        .aktivitas-wrapper {
            max-height: 180px;
            overflow-y: auto;
        }

        .activity-table thead th {
            position: sticky;
            top: 0;
            background: #fff;
            z-index: 5;
        }
        
        .col-tanggal { width: 240px; }
        .col-aktivitas { width: 600px; }
        .col-pengguna { width: 270px; }

        .activity-table tbody tr:nth-child(odd) {
            background: #dbdbdb61;
        }
        .activity-table tbody tr:nth-child(even) {
            background: #f7f7f77b;
        }

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

        <div class="sidebar-profile" style="display:flex; align-items:center; gap:22px; margin-bottom: -15px; padding:50px 23px;">
            <img src="{{ asset('img/admin/profil.png') }}" class="profile-logo" alt="Profil logo">
            <div style="display:flex; flex-direction:column; justify-content:center;">
                <div style="font-size:18px; font-weight:600; opacity:1;">
                    {{ auth()->check() ? auth()->user()->name : 'Fineshyt' }}
                </div>
                <div style="font-size:14px; opacity:0.8; margin-top:-2px;">Admin</div>
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
                    <img src="{{ asset('img/admin/pengguna-aktif.png') }}" class="picture" alt="pengguna">
                </div>
                <div class="label">Jumlah Pengguna</div>
                <div class="value">{{ number_format($jumlahPengguna ?? 0,0,',','.') }}</div>
            </div>

            <div class="stat-card">
                <div class="icon-wrap">
                    <img src="{{ asset('img/admin/kos-aktif.png') }}" class="picture" alt="kos">
                </div>
                <div class="label">Kos aktif</div>
                <div class="value">{{ number_format($kosAktif ?? 0,0,',','.') }}</div>
            </div>

            <div class="stat-card">
                <div class="icon-wrap">
                    <img src="{{ asset('img/admin/aktivitas-aktif.png') }}" class="picture" alt="aktivitas">
                </div>
                <div class="label">Jumlah Verifikasi</div>
                <div class="value">{{ number_format($jumlahVerifikasi ?? 0,0,',','.') }}</div>
            </div>
        </div>

        <!-- lower content: aktivitas + tindakan -->
        <div class="two-col">
            <div class="content-card">
                <div class="activity-section-bg">
                    <h3 style="font-weight:700; color: #ffffff;">Aktivitas terbaru</h3>
                </div>

            <div style="overflow-y:auto; max-height:180px;">
                <table class="activity-table">
                    <thead>
                        <tr>
                            <th class="col-tanggal">Tanggal</th>
                            <th class="col-aktivitas">Aktivitas</th>
                            <th class="col-pengguna">Pengguna</th>
                        </tr>
                    </thead>
                </table>
            </div>
                
            <div class="aktivitas-wrapper">    
                <table class="activity-table">
                    <tbody>
                        @forelse($aktivitas as $item)
                            <tr>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>{{ $item->kegiatan }}</td>
                                <td>
                                    @if($item->user)
                                        {{ '@' . $item->user->name }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-6 text-center text-gray-500">Belum ada aktivitas tercatat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>    
            </div>

            <div class="content-card">
                <div class="activity-section-bg">
                    <h3 style="font-weight:700; color: #ffffff;">Perlu tindakan hari ini</h3>
                </div>

                <ul style="list-style:none; padding:13px 8px; color:#444;">
                    <li class="mb-3"><span class="bullet"></span> {{ $menungguVerifikasi ?? 0 }} Kos belum diverifikasi</li>
                    <li><span class="bullet"></span> {{ $pendingReports ?? 0 }} Laporan belum direspon</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
