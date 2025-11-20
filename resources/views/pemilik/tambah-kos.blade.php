@extends('layouts.footer')

@section('content')

<div class="container mt-5 pt-5" style="max-width: 800px;">
    <h2 class="mb-4 fw-bold">Tambah Kost Baru</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm p-4">

        <form action="{{ route('pemilik.kos.store') }}" 
              method="POST" enctype="multipart/form-data">
            @csrf


            {{-- ========================== --}}
            {{-- STEP 1 — INFORMASI DASAR   --}}
            {{-- ========================== --}}
            <h4 class="fw-bold mb-3">1. Informasi Dasar</h4>

            <div class="mb-3">
                <label class="form-label">Nama Kost</label>
                <input type="text" name="nama_kos" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe Kost</label>
                <select name="tipe" class="form-select" required>
                    <option value="putra">Putra</option>
                    <option value="putri">Putri</option>
                    <option value="campur">Campur</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Kost</label>
                <textarea name="deskripsi" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Catatan (Opsional)</label>
                <textarea name="catatan" class="form-control" rows="2"></textarea>
            </div>


            {{-- ========================== --}}
            {{-- STEP 2 — LOKASI + MAP      --}}
            {{-- ========================== --}}
            <h4 class="fw-bold mb-3">2. Lokasi Kost</h4>

            <div class="mb-3">
                <label class="form-label">Alamat Lengkap</label>
                <input type="text" name="alamat" class="form-control" required>
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
                <textarea name="catatan_lokasi" class="form-control"></textarea>
            </div>

           {{-- STEP 2 — Lokasi + Map --}}
<div class="mb-4">
    <h4 class="fw-bold">Cari Alamat Kost Anda di Peta</h4>
    <small class="text-muted">
        Posisikan pin untuk menampilkan alamat kos. Silakan lengkapi dengan nomor rumah dan RT/RW jika belum ada.
    </small>

    <div id="map" style="height: 300px; border-radius: 10px; margin-top: 10px;"></div>

    <div class="mt-3">
        <label class="form-label">Alamat Lengkap</label>
        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Nama jalan, nomor rumah, RT/RW">

        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
    </div>
</div>

</div>



            {{-- ========================== --}}
            {{-- STEP 3 — FOTO-FOTO         --}}
            {{-- ========================== --}}
            <h4 class="fw-bold mb-3">3. Foto Kost</h4>

            <div class="mb-3">
                <label>Foto Tampak Depan</label>
                <input type="file" name="foto_depan" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label>Foto Tampak Dari Jalan</label>
                <input type="file" name="foto_jalan" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label>Foto Dalam Kamar</label>
                <input type="file" name="foto_kamar" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label>Foto Kamar Mandi (Opsional)</label>
                <input type="file" name="foto_mandi" class="form-control" accept="image/*">
            </div>

            <div class="mb-4">
                <label>Foto Lainnya (Opsional)</label>
                <input type="file" name="foto_lain" class="form-control" accept="image/*">
            </div>


            {{-- ========================== --}}
            {{-- STEP 4 — FASILITAS         --}}
            {{-- ========================== --}}
            <h4 class="fw-bold mb-3">4. Fasilitas</h4>

            {{-- Fasilitas Umum --}}
            <div class="mb-3">
                <label class="fw-semibold">Fasilitas Umum</label>
                <textarea name="fasilitas_umum" class="form-control" rows="2"
                    placeholder="Contoh: WiFi, Dapur Bersama, Ruang Santai"></textarea>
            </div>

            {{-- Fasilitas Kamar --}}
            <div class="mb-3">
                <label class="fw-semibold">Fasilitas Kamar</label>
                <textarea name="fasilitas_kamar" class="form-control" rows="2"
                    placeholder="Contoh: Kasur, AC, Lemari, Meja Belajar"></textarea>
            </div>

            {{-- Fasilitas Kamar Mandi --}}
            <div class="mb-3">
                <label class="fw-semibold">Fasilitas Kamar Mandi</label>
                <textarea name="fasilitas_mandi" class="form-control" rows="2"
                    placeholder="Contoh: Kamar Mandi Dalam, Water Heater"></textarea>
            </div>

            {{-- Parkir --}}
            <div class="mb-4">
                <label class="fw-semibold">Parkir (Opsional)</label>
                <textarea name="parkir" class="form-control" rows="2"
                    placeholder="Contoh: Motor 10 slot, Mobil 2 slot"></textarea>
            </div>


            {{-- ========================== --}}
            {{-- STEP 5 — KAMAR             --}}
            {{-- ========================== --}}
            <h4 class="fw-bold mb-3">5. Ketersediaan Kamar</h4>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Total Kamar</label>
                    <input type="number" name="total_kamar" class="form-control">
                </div>

                <div class="col-md-6 mb-4">
                    <label>Kamar Tersedia</label>
                    <input type="number" name="kamar_tersedia" class="form-control">
                </div>
            </div>


            {{-- ========================== --}}
            {{-- STEP 6 — HARGA             --}}
            {{-- ========================== --}}
            <h4 class="fw-bold mb-3">6. Harga</h4>

            <div class="mb-3">
                <label>Harga per Bulan</label>
                <input type="number" name="harga" class="form-control" required>
            </div>

            <div class="mb-4">
                <label>Biaya Tambahan (Opsional)</label>
                <input type="text" name="biaya_tambahan" class="form-control"
                       placeholder="Contoh: Listrik, Air, Kebersihan">
            </div>

            <button class="btn btn-warning w-100 rounded-pill py-2 fw-bold" 
                style="background:#FFA125;">
                Tambah Kost
            </button>

        </form>

    </div>
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
