@extends('layouts.main')

@section('content')
<div class="container mt-5 pt-4">
    <h2 class="fw-bold mb-4">Daftar Kos Anda</h2>

   

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kos</th>
                <th>Alamat</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kos as $k)
            <tr>
                <td>{{ $k->nama_kos }}</td>
                <td>{{ $k->alamat }}</td>
                <td>{{ $k->tipe }}</td>
                <td>Rp {{ number_format($k->harga_per_bulan) }}</td>

                <td>
                    <a href="{{ route('pemilik.kos.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('pemilik.kos.destroy', $k->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada kos</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
