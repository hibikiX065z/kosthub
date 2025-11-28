@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="container py-4">

    {{-- ======================== TITLE ======================== --}}
    <h3 class="fw-bold mb-3">
        🔍 Hasil Pencarian Kost
    </h3>

    {{-- Info pencarian --}}
    <p class="text-muted">
        Menampilkan hasil untuk:
        <strong>{{ request('lokasi') ?: 'Semua Lokasi' }}</strong>
    </p>

    {{-- ======================== SEARCH + FILTER ======================== --}}
    <div class="card shadow-sm p-4 mb-4" style="border-radius: 18px;">
        
        <form action="{{ route('pemilik.kos.search') }}" method="GET">
            <div class="row g-3">

                {{-- SEARCH BAR --}}
                <div class="col-md-4">
                    <label class="fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control"
                           placeholder="Cari lokasi..."
                           value="{{ request('lokasi') }}">
                </div>

                {{-- TIPE --}}
                <div class="col-md-3">
                    <label class="fw-semibold">Tipe Kos</label>
                    <select name="tipe" class="form-select">
                        <option value="">Semua</option>
                        <option value="putra"  {{ request('tipe')=='putra'?'selected':'' }}>Putra</option>
                        <option value="putri"  {{ request('tipe')=='putri'?'selected':'' }}>Putri</option>
                        <option value="campur" {{ request('tipe')=='campur'?'selected':'' }}>Campur</option>
                    </select>
                </div>

                {{-- HARGA MIN --}}
                <div class="col-md-2">
                    <label class="fw-semibold">Harga Min</label>
                    <input type="number" name="harga_min" class="form-control"
                           value="{{ request('harga_min') }}">
                </div>

                {{-- HARGA MAX --}}
                <div class="col-md-2">
                    <label class="fw-semibold">Harga Max</label>
                    <input type="number" name="harga_max" class="form-control"
                           value="{{ request('harga_max') }}">
                </div>

                {{-- FASILITAS --}}
                <div class="col-md-12 mt-2">
                    <label class="fw-semibold d-block mb-2">Fasilitas</label>

                    <div class="d-flex flex-wrap gap-2">

                        @php 
                            $facilities = ['WiFi','AC','Kamar Mandi Dalam','Kasur','Listrik'];
                            $selected = request('fasilitas') ?? [];
                        @endphp

                        @foreach ($facilities as $f)
                            <label class="border rounded-pill px-3 py-1 small"
                                style="cursor:pointer; background:#fafafa;">
                                <input type="checkbox" name="fasilitas[]" value="{{ $f }}"
                                    {{ in_array($f, $selected) ? 'checked' : '' }}>
                                {{ $f }}
                            </label>
                        @endforeach

                    </div>
                </div>

            </div>

            <button class="btn btn-dark w-100 mt-3">
                Terapkan Filter
            </button>

        </form>
    </div>


    {{-- ======================== LIST KOS ======================== --}}
    <div class="row">

        @forelse ($kos as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" style="border-radius: 16px; overflow:hidden;">

                    {{-- FOTO --}}
                    <img src="{{ $item->foto_depan ? asset('storage/'.$item->foto_depan) : '/img/no-image.jpg' }}"
                         class="card-img-top"
                         style="height:220px; object-fit:cover;">

                    <div class="card-body">
                        <h5 class="fw-bold">{{ $item->nama_kos }}</h5>

                        <p class="text-muted small">
                            <i class="fa fa-location-dot"></i> 
                            {{ $item->alamat }}
                        </p>

                        <span class="badge bg-warning text-dark">
                            {{ ucfirst($item->tipe) }}
                        </span>

                        <h5 class="text-danger fw-bold mt-3">
                            Rp {{ number_format($item->harga_per_bulan) }}/bulan
                        </h5>

                        <a href="{{ route('pencari.kos.show', $item->id) }}" 
                           class="btn btn-primary w-100 mt-2">
                            Detail
                        </a>
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
        {{ $kos->appends(request()->query())->links() }}
    </div>

</div>

@endsection
