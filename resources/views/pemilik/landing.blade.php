@extends('layouts.footer')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    /* SECTION HEADER */
    .hero-section {
        position: relative;
        width: 100%;
        height: 520px;
    }

    .hero-section img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(80%);
    }

    /* Header custom di depan gambar */
    .custom-header {
        position: absolute;
        top: 0px;
        left: 50%;
        transform: translateX(-50%);
        width: 92%;
        height: 90px; /* ukuran tinggi sesuai gambar */
        background: white;
        border-radius: 0 0 22px 22px;
        padding: 0 25px; /* BUKAN 30px supaya tidak melebar */
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 4px 15px rgba(0,0,0,0.25);
        z-index: 20;
    }

    /* LOGO */
    .custom-header .logo {
        height: 80px; /* ukuran sesuai PNG */
        width: auto;
        display: block;
    }

    /* NAV MENU */
    .custom-header nav {
        display: flex;
        align-items: center;
        gap: 24px; /* jarak antar menu rapi */
    }

    .custom-header nav a {
        font-size: 18px;
        font-weight: 500;
        color: #333;
        text-decoration: none;
        padding: 6px 10px;
        border-radius: 8px;
    }

    .custom-header nav a:hover {
        background: black;
        color: white;
    }

    /* Tulisan besar "Kost" */
    .hero-text {
        position: absolute;
        bottom: 20px;
        left: 11%;
        font-size: 380px;
        font-weight: 800;
        color: white;
        opacity: 0.85;
        line-height: 0.9;
        letter-spacing: 70px; /* <=== jarak huruf */
        z-index: 5;
        pointer-events: none;
    }

    /* Search Box */
    .floating-box {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: -65px; /* <--- sebagian keluar hero */
        width: 80%;
        background: white;
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        z-index: 10;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .floating-box .left-text {
        font-size: 25px;
        font-weight: 700;
        margin: 0;
    }

    .floating-box small {
        display: block;
        margin-top: -5px;
        color: #666;
    }

    .floating-box .search-group {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        padding: 8px 15px;
        border-radius: 30px;
        width: 500px;
    }

    .floating-box input {
        border: none;
        outline: none;
        width: 100%;
    }

    .floating-box button {
        border: none;
        background: none;
        font-size: 20px;
    }

    /* CARD */
    .kost-card {
        border-radius: 18px;
        transition: .2s;
        border: rgba(0, 0, 0, 0.151) solid 0.03px;
    }

    .kost-card img {
        width: 100% !important;
        display: block;
        border-radius: 18px 18px 0 0;
        height: 200px;
        object-fit: cover;
    }

    .kost-card:hover {
        transform: translateY(-4px);
    }

    .tag {
        font-size: 14px;
        padding: 4px 10px;
        border-radius: 8px;
        position: absolute;
        top: 12px;
        right: 12px;
        background: #F47A1F;
        color: white;
        font-weight: 600;
    }
</style>

{{-- HERO SECTION --}}
<div class="hero-section">

    {{-- Gambar background --}}
    <img class="bg" src="/img/pemilik/headerkos.png" alt="Background">

    {{-- HEADER CUSTOM --}}
    <div class="custom-header">
        <img src="/img/logo_hitam.png" class="logo" alt="Logo">

        <div class="d-flex align-items-center" style="gap: 24px;">

            <nav class="d-flex align-items-center" style="gap: 10px;">
                <a href="#">Home</a>
                <a href="#">Kost</a>
                <a href="#">About</a>
                <a href="{{ route('pemilik.kos.tambah') }}">Tambah Kost</a>
            </nav>

            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" 
                    href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">

                        <!-- FOTO PROFIL USER -->
                        <img src="{{ Auth::user()->foto_profil ?? asset('img/default-user.png') }}"
                            alt="profile"
                            class="rounded-circle"
                            width="38" height="38"
                            style="object-fit: cover;">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('pemilik.profile') }}">
                                <i class="bi bi-person-circle me-2"></i> Profil
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>

    </div>

    {{-- Tulisan besar KOST --}}
    <div class="hero-text">Kost</div>

    {{-- Search --}}
    <div class="floating-box">
        <div>
            <div class="left-text">Mau cari kost?</div>
            <small>Dapatkan infonya di Kosthub.</small>
        </div>

        <div class="search-group">
           <form action="{{ route('search.kos') }}" method="GET" class="d-flex gap-2">
    <input type="text" 
           name="lokasi" 
           class="form-control w-auto" 
           placeholder="Cari lokasi kost...">
    <button type="submit" class="btn btn-light border shadow-sm">
        <i class="bi bi-search"></i>
    </button>
</form>

</form>

        </div>
    </div>
</div>

{{-- Tidak Nutup Konten --}}
<div style="height: 50px;"></div>


{{-- LIST KOST --}}
<div class="container mt-5 pt-5">

    <div class="row g-4">

        @for ($i = 0; $i < 8; $i++)
        <div class="col-md-4 col-lg-3">

            <div class="card kost-card shadow-sm">
                <div class="position-relative">
                    <img src="/img/kost4.jpg">

                    <span class="tag">Putra</span>
                </div>

                <div class="p-3">

                    <h5 class="mb-1">Indah Kost</h5>

                    <small class="text-muted">
                        <i class="bi bi-geo-alt"></i> Gribig, Kudus
                    </small>

                    <div class="mt-2">
                        <span class="text-warning"><i class="bi bi-star-fill"></i> 3.5</span>
                    </div>

                    <hr>

                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <strong style="color:#F47A1F;">Rp 1.000.000</strong>
                            <div class="text-muted" style="font-size:13px;">per bulan</div>
                        </div>

                        <button class="btn btn-warning rounded-pill px-4" style="background-color: #ffa125; color: #ffffff">
                            <i class="bi bi-eye"></i> Lihat
                        </button>
                    </div>

                </div>
            </div>

        </div>
        @endfor

    </div>
</div>

@endsection
