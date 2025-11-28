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


    {{-- ========================= --}}
    {{-- 🔍 SEARCH & FILTER FORM --}}
    {{-- ========================= --}}
    <form action="{{ route('guest.kos.search') }}" method="GET">

        <div class="search-box">

            {{-- SEARCH LOKASI --}}
            <div class="mb-3">
                <label class="fw-bold mb-1">Cari Lokasi</label>
                <input 
                    type="text" 
                    name="lokasi"
                    class="form-control"
                    placeholder="Contoh: Kudus, Gondangmanis, Jati"
                    value="{{ request('lokasi') }}">
            </div>

            {{-- FILTER --}}
            <div class="row">

                {{-- TIPE --}}
                <div class="col-md-3 mb-3">
                    <label class="fw-bold mb-1">Tipe Kos</label>
                    <select name="tipe" class="form-select">
                        <option value="">Semua</option>
                        <option value="putra"  {{ request('tipe')=='putra' ? 'selected':'' }}>Putra</option>
                        <option value="putri"  {{ request('tipe')=='putri' ? 'selected':'' }}>Putri</option>
                        <option value="campur" {{ request('tipe')=='campur' ? 'selected':'' }}>Campur</option>
                    </select>
                </div>

                {{-- HARGA MIN --}}
                <div class="col-md-3 mb-3">
                    <label class="fw-bold mb-1">Harga Min</label>
                    <input type="number" 
                           name="harga_min" 
                           class="form-control" 
                           placeholder="0"
                           value="{{ request('harga_min') }}">
                </div>

                {{-- HARGA MAX --}}
                <div class="col-md-3 mb-3">
                    <label class="fw-bold mb-1">Harga Max</label>
                    <input type="number" 
                           name="harga_max" 
                           class="form-control" 
                           placeholder="20.000.000"
                           value="{{ request('harga_max') }}">
                </div>

                                            {{-- FASILITAS --}}
<div class="col-md-6 mb-3">
    <label class="fw-bold mb-2 d-block">Fasilitas</label>

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

            <button class="btn btn-primary mt-2 w-100">
                🔍 Cari Kos
            </button>

        </div>

    </form>


    {{-- ================= --}}
    {{-- LIST KOS --}}
    {{-- ================= --}}
    <div class="row">
        @forelse ($kos as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">

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
