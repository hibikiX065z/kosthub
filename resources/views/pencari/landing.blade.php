@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/css/kost.css" />


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

   




        <section class="search-section">
    <img src="/img/kost8.jpg" class="hero-img" />
    <h1 class="hero-title">Kost</h1>

    <div class="container">
        <div class="search-box-wrapper">

            <div class="floating-box">

                <!-- TEXT KIRI -->
                <div>
                    <h6 class="text-searchone mb-0">Mau cari kost?</h6>
                    <small class="text-mutedtwo">Dapatkan infonya di Kosthub.</small>
                </div>

                <!-- FORM SEARCH -->
                <form action="#" method="GET" class="d-flex align-items-center gap-3">

                    <!-- INPUT SEARCH -->
                    <div class="input-group" style="width: 360px;">
                        <input type="text"
                               name="lokasi"
                               class="form-control"
                               placeholder="Cari berdasarkan lokasi...">
                        <span class="input-group-text bg-white">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </div>

                    <!-- FILTER BUTTON -->
                    <button type="button"
                            id="openFilter"
                            class="btn btn-light border shadow-sm">
                        <i class="fa-solid fa-filter"></i>
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


        {{-- Tidak Nutup Konten --}}
        <div style="height: 20px;"></div>

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

                                <div class="rating">
                                    ⭐ <span>3.5</span>
                                </div>
                            </div>

                            <div class="location">
                                <i class="fa-solid fa-location-dot"></i>Gribig, Kudus
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

                                <a href="{{ route('pencari.detail_kost') }}" class="btn-lihat">
                                    <i class="fa-regular fa-eye"></i>
                                    Lihat
                                </a>
                            </div>

                        </div>

                    </div>
                @endfor
            </div>

        </section>

        <section class="recommend-rek">
            <div class="rec-section">

                <div class="rec-header">
                    <h2 class="rec-title">Jelajahi rekomendasi kami</h2>

                    <div class="rec-btn-row">
                        <button class="rec-btn ">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="rec-btn ">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>



                <div class="rec-carousel-wrapper">
                    <div class="rec-carousel-track">

                        @for($i = 0; $i < 12; $i++)
                            <div class="rec-card">
                                <div class="rec-img-wrapper">
                                    <img src="img/kost7.jpg" class="rec-img" />

                                    <span class="rec-like-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </span>

                                    <span class="rec-tag">Putra</span>
                                </div>

                                <div class="rec-over">
                                    <div class="rec-info-row">
                                        <h4 class="rec-name">Indah Kost</h4>

                                        <div class="rec-rating">
                                            <i class="fa-solid fa-star"></i> 3.5
                                        </div>
                                    </div>


                                    <div class="rec-footer">
                                        <div class="rec-price">
                                            Rp 1.000.000
                                            <span class="rec-price-sub">per bulan</span>
                                        </div>

                                        <a href="{{ route('pencari.detail_kost') }}" class="rec-view-btn">
                                            <i class="fa-regular fa-eye"></i> Lihat
                                        </a>
                                    </div>

                                </div>


                            </div>
                        @endfor

                    </div>
                </div>
            </div>


        </section>



        <script>
            const track = document.querySelector(".rec-carousel-track");
            const prevBtn = document.querySelector(".rec-btn-row .rec-btn:first-child");
            const nextBtn = document.querySelector(".rec-btn-row .rec-btn:last-child");

            let index = 0;
            let cardWidth = 300;

            function updateCarousel() {
                const maxIndex = track.children.length - 3;
                index = Math.max(0, Math.min(index, maxIndex));
                track.style.transition = "0.3s ease";
                track.style.transform = `translateX(-${index * cardWidth}px)`;
            }


            nextBtn.addEventListener("click", () => {
                index++;
                updateCarousel();
            });

            prevBtn.addEventListener("click", () => {
                index--;
                updateCarousel();
            });


            let isDragging = false;
            let startX = 0;
            let prevTranslate = 0;
            let currentTranslate = 0;

            function getTranslateX() {
                let matrix = window.getComputedStyle(track).transform;
                if (matrix === "none") return 0;
                return parseFloat(matrix.split(",")[4]);
            }

            track.addEventListener("mousedown", (e) => {
                isDragging = true;
                startX = e.clientX;
                prevTranslate = getTranslateX();
                track.style.transition = "none";
            });

            document.addEventListener("mousemove", (e) => {
                if (!isDragging) return;
                const movement = e.clientX - startX;
                currentTranslate = prevTranslate + movement;
                track.style.transform = `translateX(${currentTranslate}px)`;
            });

            document.addEventListener("mouseup", () => {
                if (!isDragging) return;
                isDragging = false;

                let currentX = getTranslateX();
                index = Math.round(Math.abs(currentX) / cardWidth);

                updateCarousel();
            });


            track.addEventListener("touchstart", (e) => {
                isDragging = true;
                startX = e.touches[0].clientX;
                prevTranslate = getTranslateX();
                track.style.transition = "none";
            });

            track.addEventListener("touchmove", (e) => {
                if (!isDragging) return;
                const movement = e.touches[0].clientX - startX;
                currentTranslate = prevTranslate + movement;
                track.style.transform = `translateX(${currentTranslate}px)`;
            });

            track.addEventListener("touchend", () => {
                if (!isDragging) return;
                isDragging = false;

                let currentX = getTranslateX();
                index = Math.round(Math.abs(currentX) / cardWidth);

                updateCarousel();
            });
        </script>




<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.love-icon').forEach(icon => {
            icon.addEventListener('click', function () {
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
            icon.addEventListener('click', function () {
                this.classList.toggle('active');
                this.querySelector('i').classList.toggle('fa-regular');
                this.querySelector('i').classList.toggle('fa-solid');
            });
        });
    });

   
</script>

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