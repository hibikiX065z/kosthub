@extends('layouts.footer')

<link rel="stylesheet" href="/css/detail_kost.css" />
<link rel="stylesheet" href="/css/navbar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<body>

    {{-- NAVBAR --}}
    @include('navbar.navbar_pemilik')

    {{-- ABOUT SECTION --}}
    <section class="container" style="margin-top:120px; margin-bottom:80px;">
        <div class="row">
            <div class="col-md-8">

                <h1 class="fw-bold mb-3">About Us</h1>

                <p>
                    <strong>KOSTHUB</strong> adalah platform pencarian kos berbasis website
                    yang membantu masyarakat menemukan hunian yang nyaman, aman,
                    dan sesuai kebutuhan dengan cepat dan mudah.
                </p>

                <p>
                    Melalui KOSTHUB, pencari kos dapat mengakses informasi lengkap
                    mulai dari harga, fasilitas, lokasi, hingga kontak pemilik kos
                    tanpa harus datang langsung ke lokasi.
                </p>

                <h3 class="fw-bold mt-5">Visi</h3>
                <p>
                    Menjadi platform digital terpercaya dalam menghubungkan
                    pencari kos dan pemilik kos di Indonesia.
                </p>

                <h3 class="fw-bold mt-4">Misi</h3>
                <ul>
                    <li>Menyediakan informasi kos yang akurat dan lengkap.</li>
                    <li>Mempermudah pencari kos dalam menentukan pilihan.</li>
                    <li>Membantu pemilik kos mempromosikan properti mereka.</li>
                    <li>Mendukung digitalisasi sistem pencarian hunian.</li>
                </ul>

                <h3 class="fw-bold mt-5">
                    Penghubung Pemilik <br> dan Pencari Kos
                </h3>
                <p>
                    KOSTHUB hadir sebagai jembatan antara pemilik kos dan pencari kos
                    agar proses pencarian hunian menjadi lebih efisien, transparan,
                    dan terpercaya.
                </p>

            </div>
        </div>
    </section>

</body>
@endsection
