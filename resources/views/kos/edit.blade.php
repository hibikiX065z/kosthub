@extends('layouts.footer')

@section('content')

<div class="container mt-5 pt-5" style="max-width: 700px;">
    <h2 class="fw-bold mb-4">Edit Kost</h2>

    <form action="{{ route('kos.update', $kos->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- STEP 1 — Informasi Dasar --}}
        <h5 class="fw-bold">Informasi Dasar</h5>
        <div class="mb-3">
            <label>Nama Kost</label>
            <input type="text" name="nama_kos" class="form-control" value="{{ $kos->nama_kos }}" required>
        </div>

        <div class="mb-3">
            <label>Tipe Kost</label>
            <select name="tipe" class="form-select" required>
                <option value="putra" {{ $kos->tipe=='putra' ? 'selected' : '' }}>Putra</option>
                <option value="putri" {{ $kos->tipe=='putri' ? 'selected' : '' }}>Putri</option>
                <option value="campur" {{ $kos->tipe=='campur' ? 'selected' : '' }}>Campur</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ $kos->deskripsi }}</textarea>
        </div>

        <hr>

        {{-- STEP 2 — Lokasi --}}
        <h5 class="fw-bold">Lokasi Kost</h5>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $kos->alamat }}">
        </div>

        <div class="row">
            <div class="col-6 mb-3">
                <label>Provinsi</label>
                <input type="text" name="provinsi" class="form-control" value="{{ $kos->provinsi }}">
            </div>

            <div class="col-6 mb-3">
                <label>Kabupaten</label>
                <input type="text" name="kabupaten" class="form-control" value="{{ $kos->kabupaten }}">
            </div>
        </div>

        <div class="mb-3">
            <label>Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" value="{{ $kos->kecamatan }}">
        </div>

        <div class="row">
            <div class="col-6 mb-3">
                <label>Latitude</label>
                <input type="text" name="latitude" class="form-control" value="{{ $kos->latitude }}">
            </div>

            <div class="col-6 mb-3">
                <label>Longitude</label>
                <input type="text" name="longitude" class="form-control" value="{{ $kos->longitude }}">
            </div>
        </div>

        <hr>

        {{-- STEP 3 — Foto --}}
        <h5 class="fw-bold">Foto Kost</h5>

        <div class="mb-3">
            <label>Foto Tampak Depan</label>
            <input type="file" name="foto_depan" class="form-control">
            @if($kos->foto_depan)
                <img src="{{ asset('storage/'.$kos->foto_depan) }}" width="120" class="mt-2 rounded">
            @endif
        </div>

        <div class="mb-3">
            <label>Foto Dalam Kamar</label>
            <input type="file" name="foto_kamar" class="form-control">
            @if($kos->foto_kamar)
                <img src="{{ asset('storage/'.$kos->foto_kamar) }}" width="120" class="mt-2 rounded">
            @endif
        </div>

        <hr>

        {{-- STEP 4 — Fasilitas --}}
        <h5 class="fw-bold">Fasilitas</h5>

        <div class="mb-3">
            <label>Fasilitas Umum</label>
            <input type="text" name="fasilitas_umum" class="form-control" value="{{ implode(', ', $kos->fasilitas_umum ?? []) }}">
        </div>

        <div class="mb-3">
            <label>Fasilitas Kamar</label>
            <input type="text" name="fasilitas_kamar" class="form-control" value="{{ implode(', ', $kos->fasilitas_kamar ?? []) }}">
        </div>

        <hr>

        {{-- STEP 5 — Ketersediaan --}}
        <h5 class="fw-bold">Ketersediaan Kamar</h5>

        <div class="row">
            <div class="col-6 mb-3">
                <label>Total Kamar</label>
                <input type="number" name="total_kamar" class="form-control" value="{{ $kos->total_kamar }}">
            </div>
            <div class="col-6 mb-3">
                <label>Kamar Tersedia</label>
                <input type="number" name="kamar_tersedia" class="form-control" value="{{ $kos->kamar_tersedia }}">
            </div>
        </div>

        <hr>

        {{-- STEP 6 — Harga --}}
        <h5 class="fw-bold">Harga</h5>

        <div class="mb-3">
            <label>Harga Per Bulan</label>
            <input type="number" name="harga_per_bulan" class="form-control" value="{{ $kos->harga_per_bulan }}">
        </div>

        <div class="mb-3">
            <label>Biaya Tambahan</label>
            <input type="text" name="tambahan_biaya" class="form-control" value="{{ $kos->tambahan_biaya }}">
        </div>

        <button class="btn btn-warning w-100 rounded-pill mt-3 fw-bold">
            Update Kost
        </button>

    </form>
</div>

@endsection
