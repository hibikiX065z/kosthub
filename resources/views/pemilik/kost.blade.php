@extends('layouts.footer')
<link rel="stylesheet" href="/css/navbar.css" />
<link rel="stylesheet" href="/css/pemilik_kost.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<body>

    @include('navbar.navbar_pemilik')

    <div class="page-container">

        <h2 class="page-title">Kost Saya</h2>

        <div class="kos-grid">
            @forelse($kos as $item)
                <div class="kos-card">

                    <!-- FOTO -->
                    <img src="{{ $item->foto_depan ? asset('storage/' . $item->foto_depan) : '/img/no-image.png' }}"
                        class="kos-img">

                    <div class="kos-body">

                        <h3 class="kos-title">{{ $item->nama_kos }}</h3>

                        <p class="kos-location">
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $item->alamat }}
                        </p>

                        <p class="kos-price">
                            Rp {{ number_format($item->harga_per_bulan) }} / bulan
                        </p>

                        <p class="kos-stats">
                            <i class="fa-solid fa-door-open"></i> Total: {{ $item->total_kamar }} |
                            <i class="fa-solid fa-bed"></i> Tersedia: {{ $item->kamar_tersedia }}
                        </p>

                        <!-- STATUS -->
                        <p class="kos-status">
                            @if($item->status === 'approved')
                                <span class="badge badge-approved"><i class="fa-solid fa-check"></i> Disetujui</span>
                            @elseif($item->status === 'rejected')
                                <span class="badge badge-rejected"><i class="fa-solid fa-xmark"></i> Ditolak</span>
                            @else
                                <span class="badge badge-pending"><i class="fa-solid fa-clock"></i> Menunggu</span>
                            @endif
                        </p>

                        <!-- BUTTONS -->
                        <div class="kos-actions">
                            <a href="{{ route('pemilik.kos.edit', $item->id) }}">
                                <button class="btn-edit">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                            </a>

                            <form action="{{ route('pemilik.kos.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Hapus kos ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
            @empty

                <div class="no-data-box">
                    <img src="/img/empty.png" width="180px">
                    <p>Belum ada kos yang ditambahkan.</p>
                </div>

            @endforelse
        </div>

    </div>
</body>

@endsection