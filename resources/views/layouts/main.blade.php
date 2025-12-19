<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KostHub</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="/css/main.css">
</head>
<body>

  @include('navbar.navbar_pencari')

  <main>
    @yield('content')
  </main>

  @include('navbar.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Fungsi untuk mengaktifkan kembali semua dropdown
    function initDropdowns() {
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        dropdownElementList.map(function (dropdownToggleEl) {
            // Hapus instance lama jika ada untuk mencegah duplikasi
            var oldInstance = bootstrap.Dropdown.getInstance(dropdownToggleEl);
            if (oldInstance) { oldInstance.dispose(); }
            
            return new bootstrap.Dropdown(dropdownToggleEl)
        });
    }

    // Jalankan saat halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', initDropdowns);

    // Jika Anda menggunakan AJAX/Livewire/Router manual, jalankan lagi fungsi ini setelah konten berubah
</script>
</body>
</html>
