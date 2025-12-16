@extends('layouts.footer')
<link rel="stylesheet" href="/css/edit_kost.css" />
<link rel="stylesheet" href="/css/navbar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@section('content')
<div class="edit-container">

    <h2>Edit Data Kos</h2>

    <form action="{{ route('pemilik.kos.update', $kos->id) }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- INFORMASI DASAR --}}
        <h3 class="section-title">Informasi Dasar</h3>

        <label>Nama Kos</label>
        <input type="text" class="input" name="nama_kos" value="{{ $kos->nama_kos }}">

        <label>Tipe Kos</label>
        <select name="tipe" class="input">
            <option value="Putra" {{ $kos->tipe == 'Putra' ? 'selected' : '' }}>Putra</option>
            <option value="Putri" {{ $kos->tipe == 'Putri' ? 'selected' : '' }}>Putri</option>
            <option value="Campur" {{ $kos->tipe == 'Campur' ? 'selected' : '' }}>Campur</option>
        </select>

        <label>Deskripsi</label>
        <textarea class="input" rows="4" name="deskripsi">{{ $kos->deskripsi }}</textarea>

        <label>Catatan</label>
        <textarea class="input" rows="3" name="catatan">{{ $kos->catatan }}</textarea>


        {{-- LOKASI --}}
        <h3 class="section-title">Lokasi</h3>

        <label>Alamat Lengkap</label>
        <input type="text" class="input" name="alamat" value="{{ $kos->alamat }}">

        <label>Provinsi</label>
        <input type="text" class="input" name="provinsi" value="{{ $kos->provinsi }}">

        <label>Kabupaten</label>
        <input type="text" class="input" name="kabupaten" value="{{ $kos->kabupaten }}">

        <label>Kecamatan</label>
        <input type="text" class="input" name="kecamatan" value="{{ $kos->kecamatan }}">

        <label>Catatan Alamat</label>
        <textarea class="input" rows="3" name="catatan_alamat">{{ $kos->catatan_alamat }}</textarea>

        <div class="grid-2">
            <div>
                <label>Latitude</label>
                <input type="text" class="input" name="latitude" value="{{ $kos->latitude }}">
            </div>
            <div>
                <label>Longitude</label>
                <input type="text" class="input" name="longitude" value="{{ $kos->longitude }}">
            </div>
        </div>


        {{-- FOTO --}}
        <h3 class="section-title">Foto Kos</h3>

        @php
            $fotoList = [
                'foto_depan' => 'Foto Depan',
                'foto_jalan' => 'Foto Jalan Kos',
                'foto_kamar' => 'Foto Kamar',
                'foto_kamar_mandi' => 'Foto Kamar Mandi',
                'foto_lain' => 'Foto Tambahan',
            ];
        @endphp

        @foreach($fotoList as $key => $label)
            <label>{{ $label }}</label>
            <input type="file" name="{{ $key }}" class="input">

            @if($kos->$key)
                <p>Preview:</p>
                <img src="{{ asset('storage/' . $kos->$key) }}" class="edit-img-preview">
            @endif
        @endforeach


        {{-- FASILITAS --}}
        <h3 class="section-title">Fasilitas</h3>

        @php
            $fasilitas_umum = json_decode($kos->fasilitas_umum ?? '[]', true);
            $fasilitas_kamar = json_decode($kos->fasilitas_kamar ?? '[]', true);
            $fasilitas_mandi = json_decode($kos->fasilitas_kamar_mandi ?? '[]', true);
            $fasilitas_parkir = json_decode($kos->parkir ?? '[]', true);
        @endphp

        <label>Fasilitas Umum</label>
        <div class="checkbox-group">
            @foreach(['WiFi', 'Ruang Tamu', 'Dapur', 'Laundry', 'CCTV'] as $fas)
            <label><input type="checkbox" name="fasilitas_umum[]" value="{{ $fas }}"
                {{ in_array($fas, $fasilitas_umum) ? 'checked' : '' }}>
                {{ $fas }}
            </label>
            @endforeach
        </div>

        <label>Fasilitas Kamar</label>
        <div class="checkbox-group">
            @foreach(['Kasur', 'Lemari', 'Meja', 'Kursi', 'AC'] as $fas)
            <label><input type="checkbox" name="fasilitas_kamar[]" value="{{ $fas }}"
                {{ in_array($fas, $fasilitas_kamar) ? 'checked' : '' }}>
                {{ $fas }}
            </label>
            @endforeach
        </div>

        <label>Fasilitas Kamar Mandi</label>
        <div class="checkbox-group">
            @foreach(['Dalam', 'Luar', 'Shower', 'Ember', 'Jet Shower'] as $fas)
            <label><input type="checkbox" name="fasilitas_kamar_mandi[]" value="{{ $fas }}"
                {{ in_array($fas, $fasilitas_mandi) ? 'checked' : '' }}>
                {{ $fas }}
            </label>
            @endforeach
        </div>

        <label>Parkir</label>
        <div class="checkbox-group">
            @foreach(['Motor', 'Mobil', 'Sepeda'] as $fas)
            <label><input type="checkbox" name="parkir[]" value="{{ $fas }}"
                {{ in_array($fas, $fasilitas_parkir) ? 'checked' : '' }}>
                {{ $fas }}
            </label>
            @endforeach
        </div>


        {{-- KAMAR --}}
        <h3 class="section-title">Info Kamar</h3>

        <label>Total Kamar</label>
        <input type="number" class="input" name="total_kamar" value="{{ $kos->total_kamar }}">

        <label>Kamar Tersedia</label>
        <input type="number" class="input" name="kamar_tersedia" value="{{ $kos->kamar_tersedia }}">


        {{-- HARGA --}}
        <h3 class="section-title">Harga & Biaya</h3>

        <label>Harga Per Bulan</label>
        <input type="number" class="input" name="harga_per_bulan" value="{{ $kos->harga_per_bulan }}">

        <label>Biaya Tambahan</label>
        <input type="text" class="input" name="biaya_tambahan" value="{{ $kos->biaya_tambahan }}">


        <button class="btn-orange" style="margin-top:20px">
            <i class="fa-solid fa-save"></i> Simpan Perubahan
        </button>
    </form>
</div>
@endsection
