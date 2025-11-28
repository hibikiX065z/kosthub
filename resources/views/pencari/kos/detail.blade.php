@extends('layouts.footer')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .favorite-btn {
        background:none;
        border:none;
        font-size:32px;
        cursor:pointer;
        transition:.2s;
    }
    .favorite-btn:hover {
        transform:scale(1.15);
    }
    .facility-box {
        padding:12px;
        background:#f8f9fa;
        border-radius:10px;
        display:flex;
        align-items:center;
        gap:10px;
        transition:.2s;
    }
    .facility-box:hover {
        background:#e9ecef;
        transform:scale(1.03);
    }
</style>


<header class="shadow-sm bg-white py-3 mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <img src="/img/logo_hitam.png" style="height:40px;">
            <span class="fw-bold fs-4">KostHub</span>
        </div>

        <nav class="d-flex align-items-center gap-4">
            <a href="{{ route('pencari.landing') }}">Home</a>
            <a href="{{ route('pencari.kos.index') }}">Kost</a>
            <a href="{{ route('pencari.kos.favorites.index') }}">Favorit</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>


<div class="container mb-5">

    {{-- TITLE + FAVORITE --}}
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold">{{ $kos->nama_kos }}</h2>
            <span class="badge bg-warning text-dark">{{ ucfirst($kos->tipe) }}</span>
        </div>

        <form action="{{ route('favorites.toggle', $kos->id) }}" method="POST">
            @csrf
            <button class="favorite-btn">
                @if(auth()->user()->favorites->contains($kos->id))
                    ❤️
                @else
                    🤍
                @endif
            </button>
        </form>
    </div>

    {{-- IMAGE SECTION --}}
    <div class="mt-4">
        <img src="{{ $kos->foto_depan ? asset('storage/'.$kos->foto_depan) : '/img/no-image.jpg' }}"
             class="img-fluid rounded shadow"
             style="width:100%; height:350px; object-fit:cover;">
    </div>


    {{-- INFO SECTION --}}
    <div class="row mt-4">
        
        {{-- LEFT CONTENT --}}
        <div class="col-md-8">

            <h4 class="fw-bold">📍 Lokasi</h4>
            <p class="text-muted">{{ $kos->alamat }}</p>

            {{-- Map Placeholder --}}
            <div class="rounded mb-4" style="width:100%; height:220px; background:#dedede; display:flex; justify-content:center; align-items:center;">
                <span class="text-muted">🗺 Map Preview Soon...</span>
            </div>

            <hr>

            <h4 class="fw-bold">🛏 Fasilitas</h4>

            <div class="row mt-3">
                @foreach(explode(',', $kos->fasilitas_umum ?? '') as $facility)
                <div class="col-md-6 mb-2">
                    <div class="facility-box">
                        <i class="fa-solid fa-circle-check text-success"></i>
                        {{ trim($facility) }}
                    </div>
                </div>
                @endforeach
            </div>

            <hr>
            
            <h4 class="fw-bold">📄 Deskripsi</h4>
            <p>{{ $kos->deskripsi ?? 'Tidak ada deskripsi.' }}</p>

        </div>


        {{-- RIGHT PANEL PRICE --}}
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h4 class="fw-bold text-danger">Rp {{ number_format($kos->harga_per_bulan) }}/bulan</h4>

                <p class="text-muted">Kamar tersedia: <strong>{{ $kos->kamar_tersedia }}</strong></p>

                <a href="#" class="btn btn-primary w-100 mb-2">
                    Hubungi Pemilik
                </a>

                <a href="{{ route('pencari.kos.index') }}" class="btn btn-outline-secondary w-100">
                    Kembali
                </a>
            </div>
        </div>

    </div>

</div>

@endsection
