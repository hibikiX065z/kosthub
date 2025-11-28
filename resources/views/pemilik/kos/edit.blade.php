@extends('layouts.footer')

@section('content')
<div class="container mt-5 pt-5" style="max-width: 900px;">

    <h2 class="fw-bold mb-4">Edit Kos</h2>

    <form action="{{ route('pemilik.kos.update', $kos->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- STEP 1 — Informasi Dasar --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">Informasi Dasar</div>
            <div class="card-body">

                <label class="fw-semibold">Nama Kos</label>
                <input type="text" name="nama_kos" value="{{ $kos->nama_kos }}" class="form-control mb-3">

                <label class="fw-semibold">Tipe</label>
                <select name="tipe" class="form-control mb-3">
                    <option value="putra" {{ $kos->tipe == 'putra' ? 'selected' : '' }}>Putra</option>
                    <option value="putri" {{ $kos->tipe == 'putri' ? 'selected' : '' }}>Putri</option>
                    <option value="campur" {{ $kos->tipe == 'campur' ? 'selected' : '' }}>Campur</option>
                </select>

                <label class="fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control mb-3" rows="3">{{ $kos->deskripsi }}</textarea>

                <label class="fw-semibold">Catatan</label>
                <textarea name="catatan" class="form-control" rows="2">{{ $kos->catatan }}</textarea>
            </div>
        </div>


        {{-- STEP 2 — Lokasi --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">Lokasi</div>
            <div class="card-body">

                <label>Alamat</label>
                <input type="text" name="alamat" value="{{ $kos->alamat }}" class="form-control mb-3">

                <div class="row">
                    <div class="col">
                        <label>Provinsi</label>
                        <input type="text" name="provinsi" value="{{ $kos->provinsi }}" class="form-control mb-3">
                    </div>
                    <div class="col">
                        <label>Kabupaten</label>
                        <input type="text" name="kabupaten" value="{{ $kos->kabupaten }}" class="form-control mb-3">
                    </div>
                </div>

                <label>Kecamatan</label>
                <input type="text" name="kecamatan" value="{{ $kos->kecamatan }}" class="form-control mb-3">

                <label>Catatan Tambahan Lokasi</label>
                <textarea name="catatan_alamat" rows="2" class="form-control">{{ $kos->catatan_alamat }}</textarea>
            </div>
        </div>


        {{-- STEP 3 — Foto --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">Foto Kos</div>
            <div class="card-body">

                @foreach (['foto_depan', 'foto_jalan', 'foto_kamar', 'foto_kamar_mandi', 'foto_lain'] as $foto)
                    <div class="mb-3">
                        <label class="fw-semibold">{{ ucfirst(str_replace('_',' ', $foto)) }}</label><br>

                        @if($kos->$foto)
                            <img src="{{ asset('storage/kos/'.$kos->$foto) }}" width="150" class="rounded mb-2">
                        @endif

                        <input type="file" name="{{ $foto }}" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- STEP 4 — FASILITAS --}}
<div class="card mb-4">
    <div class="card-header fw-bold">Fasilitas</div>
    <div class="card-body">

        @php
            // Semua fasilitas yang tersedia
            $allFacilitiesUmum = ['WiFi','AC','Kamar Mandi Dalam','Kasur','Listrik'];
            $allFacilitiesKamar = ['Kasur','Lemari','Meja','AC'];
            $allFacilitiesKamarMandi = ['WC Duduk','Shower','Bak Mandi'];

            // Data dari database (pastikan array, kalau null → array kosong)
            $selectedUmum = is_array($kos->fasilitas_umum) ? $kos->fasilitas_umum : [];
            $selectedKamar = is_array($kos->fasilitas_kamar) ? $kos->fasilitas_kamar : [];
            $selectedKamarMandi = is_array($kos->fasilitas_kamar_mandi) ? $kos->fasilitas_kamar_mandi : [];
        @endphp

        {{-- Fasilitas Umum --}}
        <div class="mb-3">
            <label class="fw-semibold d-block mb-2">Fasilitas Umum</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($allFacilitiesUmum as $f)
                    <label class="border rounded-pill px-3 py-1 small" style="cursor:pointer; background:#fafafa;">
                        <input type="checkbox" name="fasilitas_umum[]" value="{{ $f }}"
                            {{ in_array($f, $selectedUmum) ? 'checked' : '' }}>
                        {{ $f }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Fasilitas Kamar --}}
        <div class="mb-3">
            <label class="fw-semibold d-block mb-2">Fasilitas Kamar</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($allFacilitiesKamar as $f)
                    <label class="border rounded-pill px-3 py-1 small" style="cursor:pointer; background:#fafafa;">
                        <input type="checkbox" name="fasilitas_kamar[]" value="{{ $f }}"
                            {{ in_array($f, $selectedKamar) ? 'checked' : '' }}>
                        {{ $f }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Fasilitas Kamar Mandi --}}
        <div class="mb-3">
            <label class="fw-semibold d-block mb-2">Fasilitas Kamar Mandi</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($allFacilitiesKamarMandi as $f)
                    <label class="border rounded-pill px-3 py-1 small" style="cursor:pointer; background:#fafafa;">
                        <input type="checkbox" name="fasilitas_kamar_mandi[]" value="{{ $f }}"
                            {{ in_array($f, $selectedKamarMandi) ? 'checked' : '' }}>
                        {{ $f }}
                    </label>
                @endforeach
            </div>
        </div>

    </div>
</div>



        {{-- STEP 4 — Harga --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">Harga</div>
            <div class="card-body">
                <label>Harga / Bulan</label>
                <input type="number" name="harga_per_bulan" value="{{ $kos->harga_per_bulan }}" class="form-control mb-3">

                <label>Biaya Tambahan (opsional)</label>
                <input type="text" name="biaya_tambahan" value="{{ $kos->biaya_tambahan }}" class="form-control">
            </div>
        </div>


        {{-- STEP 5 — Kamar --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">Kamar</div>
            <div class="card-body row">
                <div class="col">
                    <label>Total Kamar</label>
                    <input type="number" name="total_kamar" value="{{ $kos->total_kamar }}" class="form-control">
                </div>
                <div class="col">
                    <label>Kamar Tersedia</label>
                    <input type="number" name="kamar_tersedia" value="{{ $kos->kamar_tersedia }}" class="form-control">
                </div>
            </div>
        </div>

        <button class="btn btn-success w-100 fw-bold py-2">Simpan Perubahan</button>

    </form>
</div>
@endsection
