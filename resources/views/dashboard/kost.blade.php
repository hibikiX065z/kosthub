<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Data Kost' }}</title>

    <link rel="stylesheet" href="/css/sidebar_admin.css">
    <link rel="stylesheet" href="/css/data_kost.css">

    <!-- Tailwind CDN (dipakai untuk utility) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    @include('layouts.sidebar_admin')

    <div class="content-wrapper">
        <div class="header-box">
            <h2>Data kos</h2>
        </div>

        <!-- Search Box -->
        <form action="{{ route('dashboard.kost') }}" method="GET" class="search-container">
            <input type="text" name="nama_kos" placeholder="cari nama kos" value="{{ request('nama_kos') }}"
                class="search-input">

            <input type="text" name="lokasi" placeholder="lokasi" value="{{ request('lokasi') }}" class="search-input">

            <button type="submit" class="btn-search">
                <i class="fa fa-search"></i> Search
            </button>
        </form>


        {{-- LIST --}}
        <div class="row">
            @forelse ($kos as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">

                            <h5 class="fw-bold">{{ $item->nama_kos }}</h5>
                            <p class="text-muted">{{ $item->lokasi }}</p>
                            <p>Rp {{ number_format($item->harga) }}/bulan</p>

                            <p class="mt-2">
                                <strong>Status:</strong>
                                @if($item->status === 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($item->status === 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-secondary">Pending</span>
                                @endif
                            </p>

                            <div class="d-flex justify-content-between mt-3">

                                {{-- APPROVE --}}
                                <form action="{{ route('admin.kos.approve', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success btn-sm" {{ $item->status == 'approved' ? 'disabled' : '' }}>
                                        Approve
                                    </button>
                                </form>

                                {{-- REJECT --}}
                                <form action="{{ route('admin.kos.reject', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-warning btn-sm" {{ $item->status == 'rejected' ? 'disabled' : '' }}>
                                        Reject
                                    </button>
                                </form>

                                {{-- DELETE --}}
                                <form action="{{ route('admin.kos.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus kos ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted mt-4">Tidak ada data kos.</p>
            @endforelse
        </div>
    </div>
</body>