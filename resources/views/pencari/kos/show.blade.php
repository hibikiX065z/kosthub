@extends('layouts.main')
@section('content')

<section class="detail-section container py-4">

    <div class="row g-4">

        <!-- =================== FOTO KOS =================== -->
        <div class="col-md-6">
            
            <img src="{{ asset('storage/' . $kos->foto_depan) }}" class="img-fluid rounded mb-3" alt="{{ $kos->nama_kos }}">

            <div class="d-flex flex-wrap gap-2">
                @foreach (['foto_jalan','foto_kamar','foto_kamar_mandi','foto_lain'] as $foto)
                    @if($kos->$foto)
                        <img src="{{ asset('storage/' . $kos->$foto) }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                    @endif
                @endforeach
            </div>
        </div>

        <!-- =================== INFORMASI KOS =================== -->
        <div class="col-md-6">
            <h2>{{ $kos->nama_kos }}</h2>
            <p class="text-muted">{{ $kos->tipe }}</p>
            <p class="fw-bold">Rp {{ number_format($kos->harga_per_bulan,0,',','.') }}/bulan</p>

            <div class="mb-3">
                <a href="https://wa.me/{{ $kos->user->phone ?? '' }}" class="btn btn-success">
                    <i class="fa-brands fa-whatsapp"></i> Hubungi Pemilik
                </a>
            </div>

            <h5>Deskripsi</h5>
            <p>{{ $kos->deskripsi }}</p>

            @if($kos->catatan)
                <h6>Catatan</h6>
                <p>{{ $kos->catatan }}</p>
            @endif

            <h5>Fasilitas Umum</h5>
            <ul class="list-inline">
                @foreach ($kos->fasilitas_umum ?? [] as $f)
                    <li class="list-inline-item badge bg-primary">{{ $f }}</li>
                @endforeach
            </ul>

            <h5>Fasilitas Kamar</h5>
            <ul class="list-inline">
                @foreach ($kos->fasilitas_kamar ?? [] as $f)
                    <li class="list-inline-item badge bg-secondary">{{ $f }}</li>
                @endforeach
            </ul>

            <h5>Fasilitas Kamar Mandi</h5>
            <ul class="list-inline">
                @foreach ($kos->fasilitas_kamar_mandi ?? [] as $f)
                    <li class="list-inline-item badge bg-info">{{ $f }}</li>
                @endforeach
            </ul>

            <h5>Parkir</h5>
            <ul class="list-inline">
                @foreach ($kos->parkir ?? [] as $f)
                    <li class="list-inline-item badge bg-warning text-dark">{{ $f }}</li>
                @endforeach
            </ul>

        </div>

    </div>

    <!-- =================== LOKASI =================== -->
    @if($kos->latitude && $kos->longitude)
        <div class="my-4">
            <h5>Lokasi</h5>
            <div id="map" style="height:300px;"></div>
        </div>
    @endif

    <!-- =================== REVIEW =================== -->
    <div class="my-4">
        <h4>Rating & Review</h4>

        @php
            $avgRating = $kos->reviews->avg('rating') ?? 0;
        @endphp
        <p>Rating: {{ number_format($avgRating,1) }} / 5 ({{ $kos->reviews->count() }} Review)</p>

        @forelse ($kos->reviews as $review)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ $review->avatar ? asset('storage/'.$review->avatar) : 'https://via.placeholder.com/40' }}" class="rounded-circle me-2" width="40" height="40">
                        <strong>{{ $review->user->name ?? 'Anonim' }}</strong>
                        <span class="ms-auto">{{ $review->rating }} ★</span>
                    </div>
                    <p>{{ $review->comment }}</p>
                </div>
            </div>
        @empty
            <p>Belum ada review.</p>
        @endforelse
    </div>

    <!-- =================== REKOMENDASI =================== -->
    @if(isset($rekomendasi) && $rekomendasi->count())
        <div class="my-4">
            <h4>Kamu Mungkin Suka</h4>
            <div class="row g-3">
                @foreach($rekomendasi as $r)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset('storage/'.$r->foto_depan) }}" class="card-img-top" style="height:150px; object-fit:cover;">
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1">{{ $r->nama_kos }}</h6>
                                <p class="mb-0 small">Rp {{ number_format($r->harga_per_bulan,0,',','.') }}/bln</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</section>

@if($kos->latitude && $kos->longitude)
<script>
    var map = L.map('map').setView([{{ $kos->latitude }}, {{ $kos->longitude }}], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    L.marker([{{ $kos->latitude }}, {{ $kos->longitude }}]).addTo(map).bindPopup("{{ $kos->nama_kos }}");
</script>
@endif




<script>
/* =========================
   Gambar Slider
========================= */
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

    let isDown = false, startX = 0;

    sliderBox.addEventListener("pointerdown", (e) => {
        e.stopPropagation();
        isDown = true;
        startX = e.clientX;
        clearInterval(autoSlide);
    });

    sliderBox.addEventListener("pointerup", (e) => {
        e.stopPropagation();
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
        dot.addEventListener("click", () => {
            index = parseInt(dot.dataset.index);
            updateSlide();
        });
    });
}

document.querySelectorAll(".slider-box").forEach(slider => initSlider(slider));

/* =========================
   Love Icon Toggle
========================= */
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.love-icon, .rec-like-btn').forEach(icon => {
        icon.addEventListener('click', function() {
            this.classList.toggle('active');
            let i = this.querySelector('i');
            i.classList.toggle('fa-regular');
            i.classList.toggle('fa-solid');
        });
    });
});

/* =========================
   Review Slider
========================= */
(function() {
    let index = 0;
    const track = document.querySelector(".review-track");
    const items = document.querySelectorAll(".review-item");
    const barContainer = document.querySelector(".slide-bars");

    items.forEach((_, i) => {
        const bar = document.createElement("div");
        bar.dataset.index = i;
        if(i===0) bar.classList.add("active");
        barContainer.appendChild(bar);
    });

    const bars = barContainer.querySelectorAll("div");

    function updateSlider() {
        track.style.transform = `translateX(-${index * 100}%)`;
        bars.forEach(b => b.classList.remove("active"));
        bars[index].classList.add("active");
    }

    bars.forEach(bar => bar.addEventListener("click", () => {
        index = parseInt(bar.dataset.index);
        updateSlider();
    }));

    setInterval(() => {
        index = (index + 1) % items.length;
        updateSlider();
    }, 4000);

    let startX = 0, isDragging = false;

    track.addEventListener("mousedown", e => { isDragging = true; startX = e.clientX; });
    track.addEventListener("mouseup", e => {
        if(!isDragging) return;
        let diff = e.clientX - startX;
        if(diff > 50) index = (index - 1 + items.length) % items.length;
        else if(diff < -50) index = (index + 1) % items.length;
        updateSlider();
        isDragging = false;
    });

    track.addEventListener("touchstart", e => startX = e.touches[0].clientX);
    track.addEventListener("touchend", e => {
        let diff = e.changedTouches[0].clientX - startX;
        if(diff > 50) index = (index - 1 + items.length) % items.length;
        else if(diff < -50) index = (index + 1) % items.length;
        updateSlider();
    });
})();

/* =========================
   Recommended Carousel
========================= */
(function() {
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

    nextBtn.addEventListener("click", () => { index++; updateCarousel(); });
    prevBtn.addEventListener("click", () => { index--; updateCarousel(); });

    let isDragging = false, startX = 0, prevTranslate = 0, currentTranslate = 0;

    function getTranslateX() {
        let matrix = window.getComputedStyle(track).transform;
        if(matrix === "none") return 0;
        return parseFloat(matrix.split(",")[4]);
    }

    track.addEventListener("mousedown", e => {
        isDragging = true; startX = e.clientX; prevTranslate = getTranslateX(); track.style.transition = "none";
    });
    document.addEventListener("mousemove", e => {
        if(!isDragging) return;
        const movement = e.clientX - startX;
        currentTranslate = prevTranslate + movement;
        track.style.transform = `translateX(${currentTranslate}px)`;
    });
    document.addEventListener("mouseup", () => {
        if(!isDragging) return;
        isDragging = false;
        let currentX = getTranslateX();
        index = Math.round(Math.abs(currentX)/cardWidth);
        updateCarousel();
    });
    track.addEventListener("touchstart", e => { isDragging = true; startX = e.touches[0].clientX; prevTranslate = getTranslateX(); track.style.transition = "none"; });
    track.addEventListener("touchmove", e => { if(!isDragging) return; const movement = e.touches[0].clientX - startX; currentTranslate = prevTranslate + movement; track.style.transform = `translateX(${currentTranslate}px)`; });
    track.addEventListener("touchend", () => { if(!isDragging) return; isDragging = false; let currentX = getTranslateX(); index = Math.round(Math.abs(currentX)/cardWidth); updateCarousel(); });
})();

/* =========================
   Rating Popup
========================= */
(function() {
    let selectedRating = 0;
    const openBtn = document.querySelector(".rec-star-btn");
    const popupOverlay = document.getElementById("ratingPopup");
    const popupClose = document.getElementById("popupClose");
    const popupStars = document.querySelectorAll("#popupStars i");
    const ratingSubmit = document.getElementById("ratingSubmit");
    const commentInput = document.getElementById("ratingComment");

    openBtn.addEventListener("click", () => {
        popupOverlay.style.display = "flex";
        selectedRating = 0; commentInput.value = "";
        popupStars.forEach(s => { s.classList.remove("fa-solid"); s.classList.add("fa-regular"); });
    });

    popupClose.addEventListener("click", () => popupOverlay.style.display = "none");

    popupStars.forEach(star => {
        star.addEventListener("click", function() {
            selectedRating = this.dataset.rate;
            popupStars.forEach(s => { s.classList.remove("fa-solid"); s.classList.add("fa-regular"); });
            popupStars.forEach(s => { if(s.dataset.rate <= selectedRating) { s.classList.remove("fa-regular"); s.classList.add("fa-solid"); } });
        });
    });

    ratingSubmit.addEventListener("click", () => {
        if(selectedRating == 0){ alert("Silakan pilih rating dulu."); return; }
        const icon = openBtn.querySelector("i");
        icon.classList.remove("fa-regular"); icon.classList.add("fa-solid"); icon.style.color = "#ffcc00";
        popupOverlay.style.display = "none";
    });
})();
</script>


@endsection
