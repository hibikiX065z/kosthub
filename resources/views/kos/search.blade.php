@extends('layouts.main')

@section('content')

<h2>Hasil Pencarian: {{ $lokasi }}</h2>

<div class="row mt-3">

    @foreach($kos as $k)
        <div class="card p-3 mb-3">
            <h4>{{ $k->nama_kos }}</h4>
            <p><strong>Lokasi:</strong> {{ $k->lokasi }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($k->harga) }}</p>
            <p><strong>Tipe:</strong> {{ $k->tipe }}</p>
            <p><strong>Fasilitas:</strong> {{ implode(', ', $k->fasilitas) }}</p>
        </div>
    @endforeach

</div>

@endsection
