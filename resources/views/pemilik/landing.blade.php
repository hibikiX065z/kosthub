@extends('layouts.footer')

@section('content')

<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/css/kost.css" />

<!-- SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .custom-btn-filter {
        background: none;
        border: 2px solid #ff7a00;
        color: #ff7a00;
        font-weight: 600;
        transition: .3s;
    }
    .custom-btn-filter:hover {
        background: #ff7a00;
        color: white;
    }
</style>

<header>
    <div class="custom-header">
        <img src="/img/logo_hitam.png" class="logo" alt="Logo">

        <div class="d-flex align-items-center" style="gap: 24px;">

            <nav class="d-flex align-items-center" style="gap: 10px;">
                <a href="#">Home</a>
                <a href="{{ route('pemilik.kos.index') }}">Kost</a>
                <a href="{{ route('pemilik.kos.create') }}">Tambah Kost</a>
                <a href="#">About</a>
            </nav>

            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" 
                       href="#" id="profileDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">

                        <img src="{{ Auth::user()->foto_profil ?? asset('img/default-user.png') }}"
                            class="rounded-circle"
                            width="38" height="38"
                            style="object-fit: cover;">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow">
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
</header>

<body>

{{-- ===================================== --}}
{{-- HERO + SEARCH SECTION --}}
{{-- ===================================== --}}
<section class="search-section">
    <img src="/img/kost8.jpg" class="hero-img">
    <h1 class="hero-title">Kost</h1>

    <div class="container">
        <div class="search-box-wrapper">
            <div class="search-box">

                <div class="floating-box">
                    <div>
                        <div class="left-text">Mau cari kost?</div>
                        <small>Dapatkan infonya di Kosthub.</small>
                    </div>

                    {{-- ========== SEARCH FORM ========== --}}
                    <form action="{{ route('guest.kos.search') }}" method="GET">

                        {{-- SEARCH BAR --}}
                        <div class="input-group mb-4">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-geo-alt"></i>
                            </span>

                            <input 
                                type="text"
                                name="lokasi"
                                class="form-control border-start-0"
                                placeholder="Cari lokasi... contoh: Kudus, Gondangmanis"
                                value="{{ request('lokasi') }}">
                        </div>

                        <div class="row g-3">

                            {{-- TIPE --}}
                            <div class="col-md-3">
                                <label class="fw-semibold mb-1">Tipe Kos</label>
                                <select name="tipe" class="form-select">
                                    <option value="">Semua</option>
                                    <option value="putra"  {{ request('tipe')=='putra'?'selected':'' }}>Putra</option>
                                    <option value="putri"  {{ request('tipe')=='putri'?'selected':'' }}>Putri</option>
                                    <option value="campur" {{ request('tipe')=='campur'?'selected':'' }}>Campur</option>
                                </select>
                            </div>

                            {{-- HARGA MIN --}}
                            <div class="col-md-3">
                                <label class="fw-semibold mb-1">Harga Min</label>
                                <input type="number" name="harga_min" class="form-control"
                                    placeholder="0" value="{{ request('harga_min') }}">
                            </div>

                            {{-- HARGA MAX --}}
                            <div class="col-md-3">
                                <label class="fw-semibold mb-1">Harga Max</label>
                                <input type="number" name="harga_max" class="form-control"
                                    placeholder="5.000.000" value="{{ request('harga_max') }}">
                            </div>

                            {{-- FASILITAS --}}
                            <div class="col-md-12 mt-2">
                                <label class="fw-semibold mb-2 d-block">Fasilitas</label>

                                <div class="d-flex flex-wrap gap-2">

                                    @php 
                                        $facilities = ['WiFi', 'AC', 'Kamar Mandi Dalam', 'Kasur', 'Listrik'];
                                        $selectedFacilities = request('fasilitas') ?: [];
                                    @endphp

                                    @foreach ($facilities as $f)
                                        <label class="border rounded-pill px-3 py-1 small" style="cursor:pointer; background:#fafafa;">
                                            <input type="checkbox" name="fasilitas[]" value="{{ $f }}"
                                                {{ in_array($f, $selectedFacilities) ? 'checked' : '' }}>
                                            {{ $f }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-dark w-100 mt-4 py-2 fs-5">
                            Cari Kos
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Spacing --}}
<div style="height: 20px;"></div>

{{-- ===================================== --}}
{{-- LISTING KOS --}}
{{-- ===================================== --}}
<section class="listings">
    <div class="card-grid">

        @for($i = 0; $i < 12; $i++)
            <div class="kost-card">

                <div class="kost-img-container">
                    <img src="img/kost7.jpg" class="kost-img">
                    <span class="badge-putra">Putra</span>
                    <span class="love-icon"><i class="fa-regular fa-heart"></i></span>
                </div>

                <div class="kost-content">
                    <div class="title-row">
                        <h3>Indah Kost</h3>
                        <div class="rating">⭐ <span>3.5</span></div>
                    </div>

                    <div class="location">
                        <i class="fa-solid fa-location-dot"></i> Gribig, Kudus
                    </div>

                    <div class="facilities">
                        <span class="tag">Wifi</span>
                        <span class="tag">Ac</span>
                        <span class="tag">Listrik</span>
                        <span class="tag">+5 lainnya</span>
                    </div>

                    <hr class="divider">

                    <div class="price-row">
                        <div class="price-box">
                            <span class="price">Rp 1.000.000</span><br>
                            <span class="perbulan">per bulan</span>
                        </div>

                        <button class="btn-lihat">
                            <i class="fa-regular fa-eye"></i> Lihat
                        </button>
                    </div>
                </div>

            </div>
        @endfor

    </div>
</section>

{{-- ===================================== --}}
{{-- REKOMENDASI --}}
{{-- ===================================== --}}
<section class="recommend">
    <div class="rec-section">

        <div class="rec-header">
            <h2 class="rec-title">Jelajahi rekomendasi kami</h2>

            <div class="rec-btn-row">
                <button class="rec-btn">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="rec-btn">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="rec-carousel-wrapper">
            <div class="rec-carousel-track">

                @for($i = 0; $i < 12; $i++)
                    <div class="rec-card">
                        <div class="rec-img-wrapper">
                            <img src="img/kost7.jpg" class="rec-img">
                            <span class="rec-like-btn"><i class="fa-regular fa-heart"></i></span>
                            <span class="rec-tag">Putra</span>
                        </div>

                        <h4 class="rec-name">Indah Kost</h4>
                        <div class="rec-rating"><i class="fa-solid fa-star"></i> 3.5</div>
                        <div class="rec-price">Rp 1.000.000 <small>per bulan</small></div>

                        <button class="rec-view-btn">
                            <i class="fa-solid fa-eye"></i> Lihat
                        </button>
                    </div>
                @endfor

            </div>
        </div>
    </div>
</section>

</body>

@endsection

{{-- ===================================== --}}
{{-- LIKE BUTTON SCRIPT --}}
{{-- ===================================== --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.love-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            this.classList.toggle('active');
            this.querySelector('i').classList.toggle('fa-regular');
            this.querySelector('i').classList.toggle('fa-solid');
        });
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.rec-like-btn').forEach(icon => {
        icon.addEventListener('click', function() {
            this.classList.toggle('active');
            this.querySelector('i').classList.toggle('fa-regular');
            this.querySelector('i').classList.toggle('fa-solid');
        });
    });
});
</script>
