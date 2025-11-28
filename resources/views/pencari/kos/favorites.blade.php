@extends('layouts.main')

@section('content')
<style>
.kos-card {
    border-radius: 15px;
    overflow: hidden;
    transition: 0.3s;
}
.kos-card:hover {
    transform: translateY(-5px);
}
.favorite-btn {
    background: none;
    border: none;
    font-size: 22px;
    cursor: pointer;
    transition: 0.2s;
}
.favorite-btn:hover {
    transform: scale(1.2);
}
.price-tag {
    font-weight: bold;
    color: #e63946;
    font-size: 18px;
}
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">❤️ Favorit Kamu</h3>
    </div>

    @if($favorites->isEmpty())
        <div class="text-center text-muted mt-5">
            <h4>😢 Belum ada kos favorit.</h4>
            <p>Klik ikon ❤️ pada kos untuk menambahkannya.</p>
        </div>
    @endif

    <div class="row gy-4">
        @foreach($favorites as $item)
        <div class="col-lg-4 col-md-6">
            <div class="card kos-card shadow-sm">

                <div style="position: relative;">
                    <img src="{{ asset('storage/'.$item->foto_depan) }}" class="w-100" style="height:200px; object-fit:cover;">

                    <form action="{{ route('favorites.toggle', $item) }}" method="POST" style="position:absolute; top:10px; right:10px;">
                        @csrf
                        <button type="submit" class="favorite-btn text-danger">
                            @if(auth()->user()->hasFavorited($item))
                                ❤️
                            @else
                                🤍
                            @endif
                        </button>
                    </form>
                </div>

                <div class="card-body">
                    <h5 class="fw-bold">{{ $item->nama_kos }}</h5>
                    <p class="text-muted">{{ $item->alamat }}</p>
                    <span class="badge bg-primary">{{ ucfirst($item->tipe) }}</span>

                    <p class="price-tag mt-3">
                        Rp {{ number_format($item->harga_per_bulan) }} / bulan
                    </p>

                    <a href="{{ route('pencari.kos.show', $item) }}" class="btn btn-outline-dark w-100 mt-2">
                        Detail Kos
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $favorites->links() }}
    </div>
</div>
@endsection
