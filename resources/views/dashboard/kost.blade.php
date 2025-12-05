<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Data Kost' }}</title>

    <link rel="stylesheet" href="/css/sidebar_admin.css">
    <link rel="stylesheet" href="/css/data_kost.css">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      integrity="sha512-+..." crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    @include('layouts.sidebar_admin')


    <div class="page">
        <div class="content-card" style="margin-bottom:20px;">
            <h2 style="font-weight:700; font-size:22px; margin:0;">
                Data Kos
            </h2>
        </div>


        <!-- Search Box -->
        <div class="content-card" style="margin-bottom:25px;">
            <form action="{{ route('dashboard.kost') }}" method="GET" class="search-row">
                <input type="text" name="nama_kos" placeholder="cari nama kos" value="{{ request('nama_kos') }}"
                    class="search-input">

                <input type="text" name="lokasi" placeholder="lokasi" value="{{ request('lokasi') }}"
                    class="search-input">

                <button type="submit" class="search-btn">
                    <i class="fa fa-search"></i> Search
                </button>

                <button type="reset" class="search-btn">
                    <i class="fa-solid fa-rotate-left"></i> Reset
                </button>
            </form>
        </div>


        <!-- LIST DATA KOST -->
        <div class="kost-grid">
            @forelse ($kos as $item)
                <div class="kost-card">

                    <!-- FOTO -->
                    <img src="{{ $item->foto_depan ? asset('storage/' . $item->foto_depan) : '/img/no-image.png' }}"
                        class="kost-img" alt="Foto kos">

                    <div class="kost-body">
                        <h3 class="kost-title">{{ $item->nama_kos }}</h3>
                        <p class="kost-location">
                            <i class="fa fa-map-marker-alt"></i>
                            {{ $item->alamat }}
                        </p>

                        <p class="kost-price">
                            Rp {{ number_format($item->harga_per_bulan) }} / bulan
                        </p>

                        <p class="kost-status">
                            Status:
                            @if($item->status === 'approved')
                                <span class="badge badge-success">Diterima</span>
                            @elseif($item->status === 'rejected')
                                <span class="badge badge-danger">Ditolak</span>
                            @else
                                <span class="badge badge-pending">Pending</span>
                            @endif
                        </p>

                        <!-- ACTION BUTTONS -->
                        <div class="kost-actions">

                            <!-- APPROVE -->
                            <form action="{{ route('kos.approve', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn-action btn-approve" {{ $item->status == 'approved' ? 'disabled' : '' }}>
                                    <i class="fa-solid fa-check"></i> Terima
                                </button>
                            </form>

                            <!-- REJECT -->
                            <form action="{{ route('kos.reject', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn-action btn-reject" {{ $item->status == 'rejected' ? 'disabled' : '' }}>
                                    <i class="fa-solid fa-xmark"></i> Tolak
                                </button>
                            </form>

                            <!-- DELETE -->
                            <form action="{{ route('kos.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus kos ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn-action btn-delete">
                                     <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            @empty
                <p class="no-data">Tidak ada data kos.</p>
            @endforelse
        </div>
    </div>

</body>

<script>
document.querySelector('button[type="reset"]').addEventListener('click', function (e) {
    e.preventDefault(); // supaya tidak hanya reset input

    // Reset form
    this.closest('form').reset();

    // Redirect ke halaman utama tanpa query
    window.location.href = "{{ route('dashboard.kost') }}";
});
</script>

</html>