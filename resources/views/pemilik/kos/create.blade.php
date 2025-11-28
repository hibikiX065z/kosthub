<!-- tambah-kos.blade.php (Versi Rapi, Clean, dan Cocok dengan Model Kos) -->

@extends('layouts.main')
@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Tambah Kos Baru</h2>

    <form action="{{ route('pemilik.kos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- =========================== -->
        <!-- STEP 1 — INFORMASI DASAR   -->
        <!-- =========================== -->
        <div class="card mb-4">
            <div class="card-header fw-bold">1. Informasi Dasar</div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Nama Kos</label>
                    <input type="text" name="nama_kos" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipe Kos</label>
                    <select name="tipe" class="form-control" required>
                        <option value="Campur">Campur</option>
                        <option value="Putra">Putra</option>
                        <option value="Putri">Putri</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control"></textarea>
                </div>

            </div>
        </div>

        <!-- =========================== -->
        <!-- STEP 2 — LOKASI             -->
        <!-- =========================== -->
        <div class="card mb-4">
            <div class="card-header fw-bold">2. Lokasi</div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Alamat Lengkap</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Provinsi</label>
                        <input type="text" name="provinsi" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Kabupaten / Kota</label>
                        <input type="text" name="kabupaten" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Catatan Lokasi (Opsional)</label>
                    <textarea name="catatan_alamat" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Pilih Lokasi di Peta</label>
                    <div id="map" style="height: 300px; border-radius: 10px;"></div>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                </div>
            </div>
        </div>

        <!-- =========================== -->
        <!-- STEP 3 — FOTO               -->
        <!-- =========================== -->
        <div class="card mb-4">
            <div class="card-header fw-bold">3. Foto Kos</div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Foto Depan Kos</label>
                    <input type="file" name="foto_depan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Akses Jalan</label>
                    <input type="file" name="foto_jalan" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Kamar</label>
                    <input type="file" name="foto_kamar" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Kamar Mandi</label>
                    <input type="file" name="foto_kamar_mandi" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Lainnya</label>
                    <input type="file" name="foto_lain" class="form-control">
                </div>

            </div>
        </div>

       <!-- =========================== -->
<!-- STEP 4 — FASILITAS          -->
<!-- =========================== -->
<div class="card mb-4">
    <div class="card-header fw-bold">4. Fasilitas</div>
    <div class="card-body">

        @php
            $allFacilitiesUmum = ['WiFi','AC','Dapur','Jemuran','TV','Parkir'];
            $allFacilitiesKamar = ['Kasur','Lemari','Meja Belajar','AC'];
            $allFacilitiesKamarMandi = ['Kamar Mandi Dalam','WC Duduk','Shower'];
            $allParkir = ['Motor','Mobil'];
        @endphp

        {{-- Fasilitas Umum --}}
        <div class="mb-3">
            <label class="form-label fw-semibold d-block mb-2">Fasilitas Umum</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($allFacilitiesUmum as $f)
                    <label class="border rounded-pill px-3 py-1 small" style="cursor:pointer; background:#fafafa;">
                        <input type="checkbox" name="fasilitas_umum[]" value="{{ $f }}">
                        {{ $f }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Fasilitas Kamar --}}
        <div class="mb-3">
            <label class="form-label fw-semibold d-block mb-2">Fasilitas Kamar</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($allFacilitiesKamar as $f)
                    <label class="border rounded-pill px-3 py-1 small" style="cursor:pointer; background:#fafafa;">
                        <input type="checkbox" name="fasilitas_kamar[]" value="{{ $f }}">
                        {{ $f }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Fasilitas Kamar Mandi --}}
        <div class="mb-3">
            <label class="form-label fw-semibold d-block mb-2">Fasilitas Kamar Mandi</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($allFacilitiesKamarMandi as $f)
                    <label class="border rounded-pill px-3 py-1 small" style="cursor:pointer; background:#fafafa;">
                        <input type="checkbox" name="fasilitas_kamar_mandi[]" value="{{ $f }}">
                        {{ $f }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Parkir --}}
        <div class="mb-3">
            <label class="form-label fw-semibold d-block mb-2">Parkir</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($allParkir as $f)
                    <label class="border rounded-pill px-3 py-1 small" style="cursor:pointer; background:#fafafa;">
                        <input type="checkbox" name="parkir[]" value="{{ $f }}">
                        {{ $f }}
                    </label>
                @endforeach
            </div>
        </div>

    </div>
</div>


        <!-- =========================== -->
        <!-- STEP 5 — KAMAR              -->
        <!-- =========================== -->
        <div class="card mb-4">
            <div class="card-header fw-bold">5. Kamar</div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Total Kamar</label>
                        <input type="number" name="total_kamar" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kamar Tersedia</label>
                        <input type="number" name="kamar_tersedia" class="form-control" required>
                    </div>
                </div>

            </div>
        </div>

        <!-- =========================== -->
        <!-- STEP 6 — HARGA              -->
        <!-- =========================== -->
        <div class="card mb-4">
            <div class="card-header fw-bold">6. Harga</div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Harga Per Bulan (Rp)</label>
                    <input type="number" name="harga_per_bulan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biaya Tambahan</label>
                    <input type="text" name="biaya_tambahan" class="form-control" placeholder="Opsional">
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Simpan Kos</button>

    </form>
</div>
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Lokasi default (Indonesia)
    let defaultLat = -6.200000;
    let defaultLng = 106.816666;

    // Inisialisasi map
    var map = L.map('map').setView([defaultLat, defaultLng], 13);

    // Tambah tile (tampilan peta)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; Kosthub Map'
    }).addTo(map);

    // Buat pin
    let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

    // Update koordinat ke input
    function updateLatLng(lat, lng) {
        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lng;
    }

    // Saat pin digeser
    marker.on('dragend', function(e) {
        let lat = e.target.getLatLng().lat;
        let lng = e.target.getLatLng().lng;
        updateLatLng(lat, lng);
    });

    // Saat map diklik → pindahkan pin
    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        updateLatLng(e.latlng.lat, e.latlng.lng);
    });
});
</script>
@endsection
