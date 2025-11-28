@extends('layouts.main')

@section('content')

{{-- CSS & ICON --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .search-box, .filter-box {
        background: #fff;
        padding: 15px 20px;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0,0,0,.08);
        margin-bottom: 25px;
    }
    .card {
        border-radius: 14px;
        overflow: hidden;
        transition: .2s;
    }
    .card:hover { transform: scale(1.02); }
</style>


<div class="container">

    <h3 class="fw-bold mb-3">🏠 Daftar Kos</h3>

   {{-- ======================== SEARCH SECTION ======================== --}}
<section class="landing-search" style="padding-bottom: 70px;">
    <div class="container">
        <div class="card shadow p-4" style="border-radius: 20px;">

            {{-- TITLE SMALL --}}
            <div class="mb-3">
                <h5 class="fw-bold m-0">Mau cari kost?</h5>
                <small class="text-muted">Temukan kost terbaikmu di Kosthub.</small>
            </div>

            {{-- ========== START FORM ========== --}}
            <form action="{{ route('pencari.kos.search') }}" method="GET">

                {{-- ========== BAR 1 : SEARCH BAR ========== --}}
                <div class="input-group mb-4">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-geo-alt"></i>
                    </span>

                    <input type="text" 
                           name="lokasi" 
                           class="form-control border-start-0"
                           placeholder="Cari lokasi... contoh: Kudus, Gondangmanis"
                           value="{{ request('lokasi') }}">

                    
                </div>

                {{-- ========== BAR 2 : FILTERS ========== --}}
                <div class="row g-3">

                    {{-- TIPE --}}
                    <div class="col-md-3">
                        <label class="fw-semibold mb-1 d-block">Tipe Kos</label>
                        <select name="tipe" class="form-select">
                            <option value="">Semua</option>
                            <option value="putra"  {{ request('tipe')=='putra'?'selected':'' }}>Putra</option>
                            <option value="putri"  {{ request('tipe')=='putri'?'selected':'' }}>Putri</option>
                            <option value="campur" {{ request('tipe')=='campur'?'selected':'' }}>Campur</option>
                        </select>
                    </div>

                    {{-- HARGA MIN --}}
                    <div class="col-md-3">
                        <label class="fw-semibold mb-1">Harga Min</label>
                        <input type="number" 
                               name="harga_min" 
                               class="form-control" 
                               placeholder="0"
                               value="{{ request('harga_min') }}">
                    </div>

                    {{-- HARGA MAX --}}
                    <div class="col-md-3">
                        <label class="fw-semibold mb-1">Harga Max</label>
                        <input type="number" 
                               name="harga_max" 
                               class="form-control" 
                               placeholder="5.000.000"
                               value="{{ request('harga_max') }}">
                    </div>

                    {{-- FASILITAS --}}
                    <div class="col-md-12 mt-2">
                        <label class="fw-semibold mb-2 d-block">Fasilitas</label>

                        <div class="d-flex flex-wrap gap-2">

                            @php 
                                $facilities = ['WiFi', 'AC', 'Kamar Mandi Dalam', 'Kasur', 'Listrik'];
                                $selectedFacilities = request('fasilitas') ?: [];
                            @endphp

                            @foreach ($facilities as $f)
                                <label class="border rounded-pill px-3 py-1 small"
                                       style="cursor:pointer; background:#fafafa;">
                                    <input type="checkbox" 
                                           name="fasilitas[]" 
                                           value="{{ $f }}"
                                           {{ in_array($f, $selectedFacilities) ? 'checked' : '' }}>
                                    {{ $f }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- BUTTON --}}
                <button class="btn btn-dark w-100 mt-4 py-2 fs-5">
                     Cari Kos
                </button>

            </form>
            {{-- ========== END FORM ========== --}}

        </div>
    </div>
</section>


    {{-- ================= --}}
    {{-- LIST KOS --}}
    {{-- ================= --}}
    <div class="row">
        @forelse ($kos as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    
     <form action="{{ route('pencari.kos.favorites.toggle', $item->id) }}" method="POST"
 style="position:absolute; top:10px; right:10px;">

            @csrf
            <button type="submit" class="favorites-btn">
                <i class="fa-solid fa-heart {{ Auth::check() && $item->favorites()->where('user_id', Auth::id())->exists() ? 'text-danger' : 'text-light' }}"></i>
            </button>
        </form>
                    

                    <img src="{{ $item->foto_depan ? asset('storage/'.$item->foto_depan) : '/img/no-image.jpg' }}"
                         class="card-img-top"
                         style="height:220px; object-fit:cover;">


                    <div class="card-body">
                        <h5 class="fw-bold">{{ $item->nama_kos }}</h5>

                        <p class="text-muted small">
                            <i class="fa fa-location-dot"></i> {{ $item->alamat }}
                        </p>

                        <span class="badge bg-warning text-dark">{{ ucfirst($item->tipe) }}</span>

                        <h5 class="fw-bold text-danger mt-3">
                            Rp {{ number_format($item->harga_per_bulan) }}/bulan
                        </h5>

                        <a href="{{ route('pencari.kos.show', $item->id) }}" 
                           class="btn btn-primary w-100 mt-2">Detail</a>
                    </div>

                </div>
            </div>
        @empty

            <div class="text-center text-muted mt-5">
                <h4>😢 Tidak ada kos ditemukan</h4>
            </div>

        @endforelse
    </div>


    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $kos->links() }}
    </div>

</div>


@endsection
