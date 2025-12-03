@extends('layouts.footer')
<link rel="stylesheet" href="/css/detail_kost.css" />
<link rel="stylesheet" href="/css/navbar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <body>

        @include('navbar.navbar_fitur')

        <section class="detail-section">

            <div class="detail-wrapper">

                <div class="detail-left">
                    <img src="img/kost9.png" class="detail-main-img">

                    <div class="detail-small-img-row">

                        <div class="slider-box">
                            <div class="slider-track">
                                <img src="img/kost7.jpg">
                                <img src="img/kost4.jpg">
                                <img src="img/kost3.jpg">
                            </div>


                            <div class="slider-dots"></div>
                        </div>

                        <div class="slider-box">
                            <div class="slider-track">
                                <img src="img/kost7.jpg">
                                <img src="img/kost1.jpg">
                                <img src="img/kost5.jpg">
                            </div>


                            <div class="slider-dots"></div>
                        </div>

                    </div>


                </div>


                <div class="detail-right">

                    <div class="detail-top-row">
                        <span class="gender-badge">Cowok</span>

                        <div class="detail-icons">
                            <button class="love-icon"><i class="fa-regular fa-heart"></i></button>
                            <button class="rec-star-btn"> <i class="fa-regular fa-star"></i></button>

                        </div>

                        <div class="rating-popup-overlay" id="ratingPopup">
                            <div class="rating-popup">


                                <button class="popup-close" id="popupClose">×</button>

                                <h3>Berikan Rating</h3>

                                <div class="popup-stars" id="popupStars">
                                    <i class="fa-regular fa-star" data-rate="1"></i>
                                    <i class="fa-regular fa-star" data-rate="2"></i>
                                    <i class="fa-regular fa-star" data-rate="3"></i>
                                    <i class="fa-regular fa-star" data-rate="4"></i>
                                    <i class="fa-regular fa-star" data-rate="5"></i>
                                </div>

                                <textarea id="ratingComment" placeholder="Tulis komentar..."></textarea>

                                <button id="ratingSubmit">Kirim</button>
                            </div>
                        </div>

                    </div>

                    <h2 class="kost-title">King House</h2>
                    <p class="kost-price">Rp. 1.500.000/bln</p>

                    <button class="wa-btn">
                        <i class="fa-brands fa-whatsapp"></i>
                        Hubungi via WhatsApp
                    </button>


                    <div class="desc-card">
                        <h3>Deskripsi</h3>

                        <div class="desc-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur. Nibh pharetra odio ut vitae a arcu gravida risus
                                lectus.
                                Scelerisque volutpat cursus sed laoreet ac iaculis sagittis pellentesque. A elementum purus
                                tristique
                                dui turpis lorem. Ipsum pulvinar cursus nascetur convallis nisl class ultricies.

                                Lorem ipsum dolor sit amet consectetur. Nibh pharetra odio ut vitae a arcu gravida risus
                                lectus.
                                Scelerisque volutpat cursus sed laoreet ac iaculis sagittis pellentesque. A elementum purus
                                tristique
                                dui turpis lorem. Ipsum pulvinar cursus nascetur convallis nisl class ultricies.
                            </p>
                        </div>
                    </div>


                    <div class="fasilitas-card">
                        <h3>Fasilitas</h3>

                        <div class="fasilitas-grid">
                            <span><i class="fa-solid fa-tv"></i> TV</span>
                            <span><i class="fa-solid fa-wifi"></i> Wifi</span>
                            <span><i class="fa-solid fa-bed"></i> Tempat tidur</span>
                            <span><i class="fa-solid fa-warehouse"></i> Lemari</span>
                            <span><i class="fa-solid fa-fan"></i> Pendingin AC</span>
                            <span><i class="fa-solid fa-chair"></i> Meja belajar</span>
                            <span><i class="fa-solid fa-door-closed"></i> Kamar mandi dalam</span>
                            <span><i class="fa-solid fa-car"></i> Parkir</span>

                        </div>
                    </div>



                </div>

            </div>

        </section>



        <section class="kh-rating-container">

            <!-- Judul -->
            <h3 class="kh-title">Rating & Reviews</h3>


            <div class="kh-rating-content">



                <div class="kh-rating-section">

                    <div class="kh-rating-wrapper">
                        <div class="kh-rating-left">
                            <h1>4,9</h1>
                            <p>(120 Review)</p>
                        </div>





                        <div class="kh-rating-bars">
                            <div class="kh-rating-row">
                                <span class="kh-rating-label"><i class="fa-solid fa-star"></i> 5</span>
                                <div class="kh-bar">
                                    <div style="width: 90%;"></div>
                                </div>
                            </div>

                            <div class="kh-rating-row">
                                <span class="kh-rating-label"><i class="fa-solid fa-star"></i> 4</span>
                                <div class="kh-bar">
                                    <div style="width: 80%;"></div>
                                </div>
                            </div>

                            <div class="kh-rating-row">
                                <span class="kh-rating-label"><i class="fa-solid fa-star"></i> 3</span>
                                <div class="kh-bar">
                                    <div style="width: 70%;"></div>
                                </div>
                            </div>

                            <div class="kh-rating-row">
                                <span class="kh-rating-label"><i class="fa-solid fa-star"></i> 2</span>
                                <div class="kh-bar">
                                    <div style="width: 40%;"></div>
                                </div>
                            </div>

                            <div class="kh-rating-row">
                                <span class="kh-rating-label"><i class="fa-solid fa-star"></i> 1</span>
                                <div class="kh-bar">
                                    <div style="width: 15%;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>




                <div class="review-wrapper">
                    <div class="review-box">

                        <div class="review-inner">
                            <div class="review-track">
                                <div class="review-item">
                                    <h3>Alex Scoot</h3>
                                    <div class="review-meta">
                                        <div class="stars">★★★★★</div>
                                        <p class="date">20 Oktober 2025</p>
                                    </div>
                                    <p class="text"> Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet
                                        consectetur.Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet
                                        consectetur.Lorem ipsum dolor sit amet consectetur.</p>
                                    <img src="img/kost9.png" class="avatar">

                                </div>

                                <div class="review-item">
                                    <h3>David Lee</h3>
                                    <div class="review-meta">
                                        <div class="stars">★★★★★</div>
                                        <p class="date">20 Oktober 2025</p>
                                    </div>

                                    <p class="text">Layanan sangat baik dan cepat.</p>
                                    <img src="img/kost9.png" class="avatar">

                                </div>

                                <div class="review-item">
                                    <h3>Maria Putri</h3>
                                    <div class="review-meta">
                                        <div class="stars">★★★★★</div>
                                        <p class="date">20 Oktober 2025</p>
                                    </div>
                                    <p class="text">Pengalaman cukup memuaskan.</p>
                                    <img src="img/kost9.png" class="avatar">

                                </div>
                            </div>
                        </div>

                        <div class="slide-bars"></div>
                    </div>
                </div>


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

                                        <button class="rec-view-btn">
                                            <i class="fa-regular fa-eye"></i> Lihat
                                        </button>
                                    </div>

                                </div>


                            </div>
                        @endfor

                    </div>
                </div>
            </div>


        </section>





        <script>
            function initSlider(sliderBox) {

                let track = sliderBox.querySelector(".slider-track");
                let imgs = track.querySelectorAll("img");
                let dotsContainer = sliderBox.querySelector(".slider-dots");

                let index = 0;

                imgs.forEach((_, i) => {
                    let dot = document.createElement("span");
                    if (i === 0) dot.classList.add("active");
                    dot.dataset.index = i;
                    dotsContainer.appendChild(dot);
                });

                let dots = dotsContainer.querySelectorAll("span");

                function updateSlide() {
                    track.style.transform = `translateX(-${index * 100}%)`;
                    dots.forEach(d => d.classList.remove("active"));
                    dots[index].classList.add("active");
                }

                let autoSlide = setInterval(() => {
                    index = (index + 1) % imgs.length;
                    updateSlide();
                }, 3000);

                let isDown = false;
                let startX = 0;

                sliderBox.addEventListener("pointerdown", (e) => {
                    e.stopPropagation(); // ⛔ CEGAH BENTROK
                    isDown = true;
                    startX = e.clientX;
                    clearInterval(autoSlide);
                });

                sliderBox.addEventListener("pointerup", (e) => {
                    e.stopPropagation(); // ⛔ CEGAH BENTROK
                    if (!isDown) return;
                    isDown = false;

                    let diff = e.clientX - startX;
                    if (diff > 50) index = Math.max(0, index - 1);
                    if (diff < -50) index = Math.min(imgs.length - 1, index + 1);

                    updateSlide();

                    autoSlide = setInterval(() => {
                        index = (index + 1) % imgs.length;
                        updateSlide();
                    }, 3000);
                });

                dots.forEach(dot => {
                    dot.addEventListener("click", (e) => {
                        e.stopPropagation(); // ⛔ CEGAH BENTROK
                        index = parseInt(dot.dataset.index);
                        updateSlide();
                    });
                });
            }

            document.querySelectorAll(".slider-box").forEach(slider => {
                initSlider(slider);
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
            (function () {

                let index = 0;
                const track = document.querySelector(".review-track");
                const items = document.querySelectorAll(".review-item");
                const barContainer = document.querySelector(".slide-bars");

                items.forEach((_, i) => {
                    const bar = document.createElement("div");
                    bar.dataset.index = i;
                    if (i === 0) bar.classList.add("active");
                    barContainer.appendChild(bar);
                });

                const bars = document.querySelectorAll(".slide-bars div");

                function updateSlider() {
                    track.style.transform = `translateX(-${index * 100}%)`;
                    bars.forEach(b => b.classList.remove("active"));
                    bars[index].classList.add("active");
                }

                bars.forEach(bar => {
                    bar.addEventListener("click", () => {
                        index = parseInt(bar.dataset.index);
                        updateSlider();
                    });
                });

                setInterval(() => {
                    index = (index + 1) % items.length;
                    updateSlider();
                }, 4000);

                let startX = 0;
                let isDragging = false;

                track.addEventListener("mousedown", (e) => {
                    isDragging = true;
                    startX = e.clientX;
                });

                track.addEventListener("mouseup", (e) => {
                    if (!isDragging) return;
                    let diff = e.clientX - startX;

                    if (diff > 50) index = (index - 1 + items.length) % items.length;
                    else if (diff < -50) index = (index + 1) % items.length;

                    updateSlider();
                    isDragging = false;
                });

                track.addEventListener("touchstart", (e) => {
                    startX = e.touches[0].clientX;
                });

                track.addEventListener("touchend", (e) => {
                    let diff = e.changedTouches[0].clientX - startX;

                    if (diff > 50) index = (index - 1 + items.length) % items.length;
                    else if (diff < -50) index = (index + 1) % items.length;

                    updateSlider();
                });

            })();
        </script>



        <!-- pop up -->
        <script>

            let selectedRating = 0;


            const openBtn = document.querySelector(".rec-star-btn");


            const popupOverlay = document.getElementById("ratingPopup");
            const popupClose = document.getElementById("popupClose");
            const popupStars = document.querySelectorAll("#popupStars i");
            const ratingSubmit = document.getElementById("ratingSubmit");
            const commentInput = document.getElementById("ratingComment");


            openBtn.addEventListener("click", () => {
                popupOverlay.style.display = "flex";
                selectedRating = 0;
                commentInput.value = "";


                popupStars.forEach(star => {
                    star.classList.remove("fa-solid");
                    star.classList.add("fa-regular");
                });
            });


            popupClose.addEventListener("click", () => {
                popupOverlay.style.display = "none";
            });


            popupStars.forEach(star => {
                star.addEventListener("click", function () {
                    selectedRating = this.getAttribute("data-rate");


                    popupStars.forEach(s => {
                        s.classList.remove("fa-solid");
                        s.classList.add("fa-regular");
                    });


                    popupStars.forEach(s => {
                        if (s.getAttribute("data-rate") <= selectedRating) {
                            s.classList.remove("fa-regular");
                            s.classList.add("fa-solid");
                        }
                    });
                });
            });


            ratingSubmit.addEventListener("click", () => {

                if (selectedRating == 0) {
                    alert("Silakan pilih rating dulu.");
                    return;
                }


                const icon = openBtn.querySelector("i");
                icon.classList.remove("fa-regular");
                icon.classList.add("fa-solid");
                icon.style.color = "#ffcc00";


                popupOverlay.style.display = "none";
            });

        </script>


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
                document.querySelectorAll('.rec-like-btn').forEach(icon => {
                    icon.addEventListener('click', function () {
                        this.classList.toggle('active');
                        this.querySelector('i').classList.toggle('fa-regular');
                        this.querySelector('i').classList.toggle('fa-solid');
                    });
                });
            });

        </script>
    </body>

    </html>


@endsection