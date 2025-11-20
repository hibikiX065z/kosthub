@extends('layouts.footer')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/css/kost.css" />
@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <header>

        <div class="custom-header">
        <img src="/img/logo_hitam.png" class="logo" alt="Logo">

        <div class="d-flex align-items-center" style="gap: 24px;">

            <nav class="d-flex align-items-center" style="gap: 10px;">
                <a href="#">Home</a>
                <a href="#">Kost</a>
                <a href="#">Tambah Kost</a>
                <a href="#">About</a>
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

    </header>

    <body>


        <section class="search-section">
            <img src="img/kost8.jpg" class="hero-img" />
            <h1 class="hero-title">Kost</h1>

            <div class="container">
                <div class="search-box-wrapper">
                    <div class="search-box">
                        <div class="d-flex flex-wrap align-items-center gap-3">

                            <div class="floating-box">
                                <div>
                                    <div class="left-text">Mau cari kost?</div>
                                    <small>Dapatkan infonya di Kosthub.</small>
                                </div>

                                <div class="search-group">
                                    <input type="text" placeholder="Cari kost...">
                                    <button><i class="bi bi-search"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

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

                                <button class="btn-lihat">
                                    <i class="fa-regular fa-eye"></i>

                                    Lihat
                                </button>
                            </div>

                        </div>

                    </div>
                @endfor
            </div>

        </section>

        <section class="recommend">
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

                                <h4 class="rec-name">Indah Kost</h4>

                                <div class="rec-rating">
                                    <i class="fa-solid fa-star"></i> 3.5
                                </div>

                                <div class="rec-price">
                                    Rp 1.000.000 <small>per bulan</small>
                                </div>

                                <button class="rec-view-btn">
                                    <i class="fa-solid fa-eye"></i> Lihat
                                </button>
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



    </body>


@endsection

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