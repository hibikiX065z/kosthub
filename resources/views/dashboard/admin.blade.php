<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KostHub - Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            background: #f4f4f4;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #f57c20;
            color: white;
            height: 100vh;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            background: white;
            color: #f57c20;
            padding: 10px;
            border-radius: 12px;
            margin-bottom: 40px;
            text-align: center;
        }
        .menu-item {
            padding: 12px 15px;
            margin-bottom: 8px;
            background: rgba(255,255,255,0.2);
            border-radius: 8px;
            cursor: pointer;
        }
        .menu-item:hover {
            background: rgba(255,255,255,0.35);
        }
        .logout {
            margin-top: auto;
            padding: 12px 15px;
            background: rgba(255,255,255,0.2);
            border-radius: 8px;
            cursor: pointer;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 30px;
        }
        .header {
            background: #f57c20;
            color: white;
            padding: 25px;
            font-size: 32px;
            font-weight: bold;
            border-radius: 12px;
            text-align: center;
        }

        /* Cards */
        .stats-container {
            margin-top: 30px;
            display: flex;
            gap: 20px;
        }
        .card {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 14px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .card-title {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .card-value {
            font-size: 36px;
            font-weight: bold;
        }

        /* Activity */
        .activity-section {
            margin-top: 30px;
            display: flex;
            gap: 20px;
        }
        .activity-card {
            flex: 2;
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .todo-card {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }
        td {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">KostHub</div>
        <div class="menu-item">Dashboard</div>
        <div class="menu-item">Pengguna</div>
        <div class="menu-item">Data Kost</div>
        <div class="menu-item">Laporan</div>
        <div class="menu-item">Aktivitas</div>
        <div class="menu-item">Pengaturan</div>
        <div class="logout">
            <a href="{{ route('logout') }}">Logout</a></div>
    </div>

    <div class="content">
        <div class="header">Selamat Datang Admin Fineshyt</div>

        <div class="stats-container">
            <div class="card">
                <div class="card-title">Jumlah Pengguna</div>
                <div class="card-value">10.500</div>
            </div>
            <div class="card">
                <div class="card-title">Kost Aktif</div>
                <div class="card-value">500</div>
            </div>
            <div class="card">
                <div class="card-title">Menunggu Verifikasi</div>
                <div class="card-value">10</div>
            </div>
        </div>

        <div class="activity-section">
            <div class="activity-card">
                <h3>Aktivitas Terbaru</h3>
                <table>
                    <tr>
                        <td>28 Okt 2025</td>
                        <td>Pemilik menambahkan kost</td>
                        <td>@alanxpanji</td>
                    </tr>
                    <tr>
                        <td>28 Okt 2025</td>
                        <td>Kost disetujui admin</td>
                        <td>@wafdaicikiwir</td>
                    </tr>
                    <tr>
                        <td>28 Okt 2025</td>
                        <td>Pencari registrasi akun</td>
                        <td>@dewaganteng</td>
                    </tr>
                </table>
            </div>

            <div class="todo-card">
                <h3>Perlu Tindakan Hari Ini</h3>
                <ul>
                    <li>3 kos belum diverifikasi</li>
                    <li>2 laporan pengguna belum direspon</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>