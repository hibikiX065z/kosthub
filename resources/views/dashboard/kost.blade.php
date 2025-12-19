<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Data Kost' }}</title>

    <link rel="stylesheet" href="/css/sidebar_admin.css">
    <link rel="stylesheet" href="/css/data_kost.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
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

            <div class="kost-card">

                <!-- FOTO -->
                <img src="/img/no-image.png" class="kost-img" alt="Foto kos">

                <div class="kost-body">
                    <h3 class="kost-title">Kost Melati Indah</h3>

                    <p class="kost-location">
                        <i class="fa fa-map-marker-alt"></i>
                        Jl. Diponegoro No. 21, Kudus
                    </p>

                    <p class="kost-price">
                        Rp 1.200.000 / bulan
                    </p>

                    <p class="kost-status">
                        Status:
                        <span class="badge badge-pending">Pending</span>
                    </p>

                    <!-- ACTION BUTTONS -->
                    <div class="kost-actions">

                        <button class="btn-action btn-approve">
                            <i class="fa-solid fa-check"></i> Terima
                        </button>

                        <button class="btn-action btn-reject">
                            <i class="fa-solid fa-xmark"></i> Tolak
                        </button>

                        <button class="btn-action btn-delete" onclick="hapusKos()">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>

                    </div>
                </div>
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