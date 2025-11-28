@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="/css/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/css/main.css">

<div>

    {{-- ======================== HERO SECTION ======================== --}}
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">

                {{-- LEFT TEXT --}}
                <div class="col-md-6 hero-text">

                    <div class="text-secondary">
                        <i class="bi bi-graph-up-arrow"></i>
                        <span>1000+ Kost Tersedia</span>
                    </div>

                    <h1>
                        Temukan <br>
                        Kost<br>
                        <span>Impianmu</span>
                    </h1>

                    <p class="text-one">
                        Cari kost nyaman dengan harga terjangkau di berbagai lokasi strategis.
                        Mudah, cepat, dan terpercaya.
                    </p>

                    <div class="d-flex gap-5 mt-4">
                        <div>
                            <h5 class="fw-boldone">1000+</h5>
                            <p class="text-muted m-0">Kost Tersedia</p>
                        </div>

                        <div>
                            <h5 class="fw-boldone">340+</h5>
                            <p class="text-muted m-0">Pemilik Terpercaya</p>
                        </div>

                        <div>
                            <h5 class="fw-boldone">340+</h5>
                            <p class="text-muted m-0">Penghuni Kost</p>
                        </div>
                    </div>

                </div>

                {{-- RIGHT IMAGE --}}
                <div class="col-md-6 text-center">
                    <div class="img-wrapper position-relative">
                        <img src="img/kost1.jpg" class="imgkost1">

                        <div class="harga-box">
                            <div class="harga-text">
                                <span class="harga-label">Mulai dari</span><br>
                                <span class="harga-harga">Rp 350.000/bln</span>
                            </div>

                            <i class="fa-solid fa-house harga-icon"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


   {{-- ======================== SEARCH SECTION ======================== --}}
<section class="landing-search" style="padding-bottom: 70px;">
    <div class="container">
        <div class="card shadow p-4" style="border-radius: 20px;">

            {{-- TITLE SMALL --}}
            <div class="mb-3">
                <h5 class="fw-bold m-0">Mau cari kost?</h5>
                <small class="text-muted">Temukan kost terbaikmu di Kosthub.</small>
            </div>

            {{-- ========== START FORM ========== --}}
            <form action="{{ route('guest.kos.search') }}" method="GET">

                {{-- ========== BAR 1 : SEARCH BAR ========== --}}
                <div class="input-group mb-4">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-geo-alt"></i>
                    </span>

                    <input type="text" 
                           name="lokasi" 
                           class="form-control border-start-0"
                           placeholder="Cari lokasi... contoh: Kudus, Gondangmanis"
                           value="{{ request('lokasi') }}">

                    
                </div>

                {{-- ========== BAR 2 : FILTERS ========== --}}
                <div class="row g-3">

                    {{-- TIPE --}}
                    <div class="col-md-3">
                        <label class="fw-semibold mb-1 d-block">Tipe Kos</label>
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
                        <input type="number" 
                               name="harga_min" 
                               class="form-control" 
                               placeholder="0"
                               value="{{ request('harga_min') }}">
                    </div>

                    {{-- HARGA MAX --}}
                    <div class="col-md-3">
                        <label class="fw-semibold mb-1">Harga Max</label>
                        <input type="number" 
                               name="harga_max" 
                               class="form-control" 
                               placeholder="5.000.000"
                               value="{{ request('harga_max') }}">
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
                                <label class="border rounded-pill px-3 py-1 small"
                                       style="cursor:pointer; background:#fafafa;">
                                    <input type="checkbox" 
                                           name="fasilitas[]" 
                                           value="{{ $f }}"
                                           {{ in_array($f, $selectedFacilities) ? 'checked' : '' }}>
                                    {{ $f }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- BUTTON --}}
                <button class="btn btn-dark w-100 mt-4 py-2 fs-5">
                     Cari Kos
                </button>

            </form>
            {{-- ========== END FORM ========== --}}

        </div>
    </div>
</section>



    {{-- ======================== KOST TREE SECTION ======================== --}}
    <section class="kost-tree">
        <div class="container">
            <div class="kost-wrapper">

                {{-- LEFT BIG CARD --}}
                <div class="kost-card large">
                    <img src="img/kost1.jpg" class="imgkost2">
                    <div class="overlay"></div>

                    <div class="text-box">
                        <h2>Kost Indah</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur. Suspendisse nibh in nibh dolor in.
                            Ipsum massa mauris dictumst amet nisl. Nibh ornare malesuada donec arcu
                            consectetur dictum consectetur scelerisque augue.
                        </p>
                    </div>
                </div>

                {{-- RIGHT SMALL CARDS --}}
                <div class="kost-right">

                    <div class="kost-card small">
                        <img src="img/kost7.jpg" class="imgkost3">
                        <div class="overlay"></div>

                        <div class="text-box">
                            <h3>King House</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur.
                                Nulla sed aliquet enim nisl porttitor augue amet eros a mauris.
                            </p>
                        </div>
                    </div>

                    <div class="kost-card small">
                        <img src="img/kost6.png" class="imgkost3">
                        <div class="overlay"></div>

                        <div class="text-box">
                            <h3>King House</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur.
                                Nulla sed aliquet enim nisl porttitor augue amet eros a mauris.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- ======================== FEATURES SECTION ======================== --}}
    <section class="py-5 text-center">
        <div class="container--unggul">
            <h4 class="fw-bold mb-3">Mengapa memilih Kosthub?</h4>
            <p class="text-muted mb-5">Platform pencarian dengan berbagai keunggulan</p>

            <div class="row g-6">

                <div class="box-unggulan">
                    <i class="bi bi-shield-check feature-icon"></i>
                    <h6 class="mt-3 fw-bold">Aman & Terpercaya</h6>
                    <p class="text-muted small">
                        Semua pemilik kost terverifikasi dan terpercaya.
                    </p>
                </div>

                <div class="box-unggulan">
                    <i class="bi bi-award feature-icon"></i>
                    <h6 class="mt-3 fw-bold">Kualitas Terjamin</h6>
                    <p class="text-muted small">
                        Hanya menampilkan kost yang berkualitas dan terbaik.
                    </p>
                </div>

                <div class="box-unggulan">
                    <i class="bi bi-people feature-icon"></i>
                    <h6 class="mt-3 fw-bold">5000+ Penghuni</h6>
                    <p class="text-muted small">
                        Ribuan penghuni telah menemukan kost impian mereka.
                    </p>
                </div>

                <div class="box-unggulan">
                    <i class="bi bi-headset feature-icon"></i>
                    <h6 class="mt-3 fw-bold">Support 24/7</h6>
                    <p class="text-muted small">
                        Tim kami siap membantu anda kapan saja.
                    </p>
                </div>

            </div>
        </div>
    </section>


    {{-- ======================== REVIEWS SECTION ======================== --}}
    <section class="py-5">
        <div class="container text-center">

            <h5 class="fw-bold mb-4">Rating & Reviews</h5>

            <div class="row g-4 justify-content-center">
                @for($i = 0; $i < 2; $i++)
                    <div class="col-md-5">
                        <div class="review-card text-start">

                            <h6 class="fw-bold">Alex Scoot</h6>

                            <div class="rating-row">
                                <p class="text-warning mb-1">★★★★☆</p>
                                <span class="review-date">12 Jan 2025</span>
                            </div>

                            <p class="text-muted small">
                                Lorem ipsum dolor sit amet consectetur.
                                Et mauris in et ac eu integer. Praesent fermentum dictum sit ut aliquam purus.
                            </p>

                            <img src="img/kost2.jpg" class="img-circle">

                        </div>
                    </div>
                @endfor
            </div>

        </div>
    </section>

</div>
@endsection
