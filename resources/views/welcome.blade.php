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

<section class="search-section">
            <div class="container">
                <div class="search-box-wrapper">
                    <div class="search-box">
                        <form action="" method="GET" class="d-flex flex-wrap align-items-center gap-3">

                            <div class="flex-grow-1">
                                <h6 class="text-searchone">Mau cari kost?</h6>
                                <small class="text-mutedtwo">
                                    Dapatkan infonya di Kosthub.
                                </small>
                            </div>

                            <!-- Input + Icon Search -->
                            <div class="input-group w-auto">

                                <input type="text" name="lokasi" class="form-control"
                                    placeholder="Cari berdasarkan lokasi...">
                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-magnifying-glass" style="color: #000;"></i>
                                </span>
                            </div>

                            <!-- Tombol Filter -->
                            <button id="openFilter" type="button" class="btn btn-light border shadow-sm">
                                <i class="fa-solid fa-filter" style="opacity:0.6;"></i>
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </section>

        <!-- Overlay Gelap -->
        <div id="filterOverlay" class="filter-overlay"></div>

        <!-- Sidebar Filter -->
        <div id="filterSidebar" class="filter-sidebar">
            <div class="filter-header">
                <h4>Filter</h4>
                <button id="closeFilter" class="close-btn">&times;</button>
            </div>

            <form action="welcome" method="GET">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" placeholder="Cari lokasi…">

                <label class="mt-3">Harga</label>
                <div class="d-flex gap-2">
                    <input type="number" name="harga_min" class="form-control" placeholder="Minimal">
                    <input type="number" name="harga_max" class="form-control" placeholder="Maksimal">
                </div>

                <label class="mt-3">Tipe Kost</label>
                <select name="tipe" class="form-control">
                    <option value="">All</option>
                    <option value="putra">Putra</option>
                    <option value="putri">Putri</option>
                    <option value="campur">Campur</option>
                </select>

                <label class="mt-3">Facility</label>
                <div class="facility-list">
                    <label><input type="checkbox" name="fasilitas[]" value="AC"> Air conditioning</label>
                    <label><input type="checkbox" name="fasilitas[]" value="WiFi"> WiFi</label>
                    <label><input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam"> En-suite Bathroom</label>
                    <label><input type="checkbox" name="fasilitas[]" value="Meja"> Cupboard / Table</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-4">Terapkan</button>
            </form>
        </div>


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


   <script>
document.getElementById("openFilter").addEventListener("click", () => {
    document.getElementById("filterSidebar").classList.add("active");
    document.getElementById("filterOverlay").style.display = "block";
});

document.getElementById("closeFilter").addEventListener("click", () => {
    document.getElementById("filterSidebar").classList.remove("active");
    document.getElementById("filterOverlay").style.display = "none";
});

document.getElementById("filterOverlay").addEventListener("click", () => {
    document.getElementById("filterSidebar").classList.remove("active");
    document.getElementById("filterOverlay").style.display = "none";
});
</script>
@endsection
