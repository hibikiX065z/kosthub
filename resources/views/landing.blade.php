<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KostHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff;
      font-family: 'Poppins', sans-serif;
      color: #222;
    }
    .hero-section {
      background-color: #ffe4d1;
      padding: 80px 0;
    }
    .hero-text h1 {
      font-weight: 700;
    }
    .hero-text h1 span {
      color: #ff7a00;
    }
    .search-box {
      background: white;
      border-radius: 15px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
      padding: 20px;
      margin-top: 40px;
    }
    .search-box input {
      border: none;
      box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
    }
    .search-box select {
      border: none;
      box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
    }
    .card-kost img {
      border-radius: 10px;
    }
    .feature-icon {
      font-size: 30px;
      color: #ff7a00;
    }
    footer {
      background-color: #000;
      color: #fff;
      padding: 50px 0;
    }
    .review-card {
      border-radius: 10px;
      box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
      padding: 20px;
      background: #fff;
    }
    .footer-logo {
      font-size: 28px;
      font-weight: 700;
      color: white;
    }
    .footer-logo span {
      color: #ff7a00;
    }
    /* Tombol Daftar dan Masuk */
.daftar-btn {
  border: 2px solid #ff7a00;
  color: #ff7a00;
  font-weight: 600;
  transition: all 0.3s ease;
}

.daftar-btn:hover {
  background-color: #ff7a00;
  color: white;
  box-shadow: 0 4px 10px rgba(255, 122, 0, 0.3);
}

.masuk-btn {
  background: linear-gradient(45deg, #ff7a00, #ffb347);
  border: none;
  color: white;
  font-weight: 600;
  box-shadow: 0 4px 10px rgba(255, 122, 0, 0.3);
  transition: all 0.3s ease;
}

.masuk-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(255, 122, 0, 0.5);
}

  </style>
</head>
<body>

 <!-- Navbar -->
<nav class="navbar navbar-light bg-white shadow-sm py-3 px-5">
  <a class="navbar-brand fw-bold fs-3" href="#">
    Kost<span class="text-warning">hub</span>
  </a>
  <div>
    <a href="/register-pencari" class="btn btn-outline-dark rounded-pill px-4 me-2 daftar-btn">Daftar</a>
    <a href="/login" class="btn masuk-btn rounded-pill px-4">Masuk</a>
    </div>
</nav>


  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 hero-text">
          <p class="text-secondary"><i class="bi bi-house-door-fill text-warning"></i> 1000+ Kost Tersedia</p>
          <h1>Temukan Kost<br><span>Impianmu</span></h1>
          <p class="text-muted mt-3">Cari kost nyaman dengan harga terjangkau di berbagai lokasi strategis. Mudah, cepat, dan terpercaya.</p>
          <div class="d-flex gap-5 mt-4">
            <div><h5 class="fw-bold">1000+</h5><p class="text-muted m-0">Kost Tersedia</p></div>
            <div><h5 class="fw-bold">340+</h5><p class="text-muted m-0">Pemilik Terpercaya</p></div>
            <div><h5 class="fw-bold">340+</h5><p class="text-muted m-0">Penghuni Kost</p></div>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <div class="position-relative">
            <img src="https://i.ibb.co/tm5mLyN/room.jpg" alt="Kost Room" class="img-fluid rounded-4 shadow">
            <div class="position-absolute bottom-0 start-0 m-3 bg-white p-2 rounded-3 shadow-sm fw-semibold text-warning">
              Mulai dari <br> Rp 350.000/bln
            </div>
          </div>
        </div>
      </div>

      <!-- Search Box -->
      <div class="search-box mt-5">
        <div class="d-flex flex-wrap align-items-center gap-3">
          <div class="flex-grow-1">
            <h6 class="fw-bold mb-1">Mau cari kost?</h6>
            <small class="text-muted">Dapatkan infonya di Kosthub.</small>
          </div>
          <input type="text" class="form-control w-auto" placeholder="Cari kost...">
          <button class="btn btn-light border shadow-sm"><i class="bi bi-search"></i></button>
          <select class="form-select w-auto"><option>Harga</option></select>
          <select class="form-select w-auto"><option>Lokasi</option></select>
          <select class="form-select w-auto"><option>Tipe</option></select>
        </div>
      </div>
    </div>
  </section>

  <!-- Daftar Kost -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 card-kost">
            <img src="https://i.ibb.co/tm5mLyN/room.jpg" class="card-img-top" alt="Kost">
            <div class="card-body">
              <h5 class="card-title fw-bold">Kost Indah</h5>
              <p class="text-muted">Lorem ipsum dolor sit amet consectetur. Suspendisse nibh.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 card-kost">
            <img src="https://i.ibb.co/tm5mLyN/room.jpg" class="card-img-top" alt="Kost">
            <div class="card-body">
              <h5 class="card-title fw-bold">King House</h5>
              <p class="text-muted">Lorem ipsum dolor sit amet consectetur. Nulla sed aliquam.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 card-kost">
            <img src="https://i.ibb.co/tm5mLyN/room.jpg" class="card-img-top" alt="Kost">
            <div class="card-body">
              <h5 class="card-title fw-bold">Queen House</h5>
              <p class="text-muted">Lorem ipsum dolor sit amet consectetur. Nulla sed aliquam.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Mengapa Memilih Kosthub -->
  <section class="py-5 bg-light text-center">
    <div class="container">
      <h4 class="fw-bold mb-3">Mengapa memilih Kosthub?</h4>
      <p class="text-muted mb-5">Platform pencarian dengan berbagai keunggulan</p>
      <div class="row g-4">
        <div class="col-md-3">
          <i class="bi bi-shield-check feature-icon"></i>
          <h6 class="mt-3 fw-bold">Aman & Terpercaya</h6>
          <p class="text-muted small">Semua pemilik kost terverifikasi dan terpercaya</p>
        </div>
        <div class="col-md-3">
          <i class="bi bi-award feature-icon"></i>
          <h6 class="mt-3 fw-bold">Kualitas Terjamin</h6>
          <p class="text-muted small">Menampilkan kost terbaik yang berkualitas</p>
        </div>
        <div class="col-md-3">
          <i class="bi bi-people feature-icon"></i>
          <h6 class="mt-3 fw-bold">5000+ Penghuni</h6>
          <p class="text-muted small">Ribuan penghuni telah menemukan kost impian mereka</p>
        </div>
        <div class="col-md-3">
          <i class="bi bi-headset feature-icon"></i>
          <h6 class="mt-3 fw-bold">Support 24/7</h6>
          <p class="text-muted small">Tim kami siap membantu Anda kapan saja</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Rating & Reviews -->
  <section class="py-5">
    <div class="container text-center">
      <h5 class="fw-bold mb-4">Rating & Reviews</h5>
      <div class="row g-4 justify-content-center">
        <div class="col-md-5">
          <div class="review-card text-start">
            <h6 class="fw-bold">Alex Scoot</h6>
            <p class="text-warning mb-1">★★★★☆</p>
            <p class="text-muted small">Lorem ipsum dolor sit amet consectetur. Et mauris in et ac eu integer.</p>
          </div>
        </div>
        <div class="col-md-5">
          <div class="review-card text-start">
            <h6 class="fw-bold">Alex Scoot</h6>
            <p class="text-warning mb-1">★★★★☆</p>
            <p class="text-muted small">Lorem ipsum dolor sit amet consectetur. Et mauris in et ac eu integer.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="footer-logo">Kost<span>hub</span></div>
        </div>
        <div class="col-md-4 mb-4">
          <h6 class="fw-bold mb-3">KostHub</h6>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white-50 text-decoration-none">Promosikan Kost Anda</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Tentang Kami</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Pusat Bantuan</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-4">
          <h6 class="fw-bold mb-3">Hubungi Kami</h6>
          <p class="text-white-50 small mb-1"><i class="bi bi-envelope"></i> admin@kosthub.com</p>
          <p class="text-white-50 small mb-1"><i class="bi bi-telephone"></i> +62 88868934521</p>
          <div class="d-flex gap-3 mt-2">
            <i class="bi bi-facebook"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-instagram"></i>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>