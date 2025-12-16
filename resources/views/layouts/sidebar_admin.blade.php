<div class="admin-sidebar">
    <div class="sidebar-logo">
        <img src="{{ asset('img/admin/logohitam.png') }}" alt="Kosthub logo">
    </div>

    <div class="sidebar-profile"
        style="display:flex; align-items:center; gap:22px; margin-bottom: -15px; padding:50px 23px;">
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
            <img src="{{ asset('img/admin/dashboard.png') }}" class="icon" alt="dashboard">
            <span style="font-weight:600; font-size:18px;">Dashboard</span>
        </a>

        <a href="{{ route('dashboard.pengguna') }}" class="sidebar-menu-item">
            <img src="{{ asset('img/admin/pengguna.png') }}" class="icon" alt="pengguna">
            <span style="font-weight:600; font-size:18px;">Pengguna</span>
        </a>

        <a href="{{ route('dashboard.kost') }}" class="sidebar-menu-item">
            <img src="{{ asset('img/admin/kos.png') }}" class="icon" alt="kos">
            <span style="font-weight:600; font-size:18px;">Data Kost</span>
        </a>

        <a href="{{ route('dashboard.laporan') }}" class="sidebar-menu-item">
            <img src="{{ asset('img/admin/laporan.png') }}" class="icon" alt="dashboard">
            <span style="font-weight:600; font-size:18px;">Laporan</span>
        </a>

        <a href="{{ route('dashboard.aktivitas') }}" class="sidebar-menu-item">
            <img src="{{ asset('img/admin/aktivitas.png') }}" class="icon" alt="aktivitas">
            <span style="font-weight:600; font-size:18px;">Aktivitas</span>
        </a>

        <a href="{{ route('dashboard.pengaturan') }}" class="sidebar-menu-item">
            <img src="{{ asset('img/admin/pengaturan.png') }}" class="icon" alt="pengaturan">
            <span style="font-weight:600; font-size:18px;">Pengaturan</span>
        </a>
    </div>

    <div class="sidebar-logout">
        <a href="#" class="sidebar-logout" style="color:#fff;"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

            <img src="{{ asset('img/admin/logout.png') }}" class="icon" alt="logout">
            <span style="font-weight:700; font-size:18px;">Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>
</div>

<div class="main-area">
    <!-- top orange header (full width inside content) -->
    <div class="header-top">
        <h1>Selamat Datang {{ auth()->check() ? auth()->user()->name : 'Fineshyt' }}</h1>
    </div>