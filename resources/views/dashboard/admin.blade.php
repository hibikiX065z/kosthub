<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Dashboard Admin' }}</title>

    <!-- Tailwind CDN (dipakai untuk utility) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="/css/sidebar_admin.css">

</head>
<body>

    @include('layouts.sidebar_admin')

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
