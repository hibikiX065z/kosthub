<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KostHub - Daftar Pencari Kos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background-image: url('{{ asset("img/bg.png") }}');
            background-size: cover;
            background-position: center;
        }
        .container {
            display: flex;
            max-width: 800px;
            width: 100%;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .left-panel {
            flex: 1;
            position: relative;
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), 
                              url('{{ asset("img/gambar1.jpg") }}');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }
        .logo-left {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .logo-left img {
            width: 120px;
            height: auto;
        }
        .left-panel h1 {
            font-size: 2.5rem;
            margin-top: 50px;
            margin-bottom: 20px;
        }
        .left-panel p {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        .right-panel {
            flex: 1;
            padding: 40px;
        }
        .tagline {
            color: #666;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        input:focus {
            border-color: #4a90e2;
            outline: none;
        }
        .gender-group {
            display: flex;
            gap: 20px;
            margin-top: 5px;
        }
        .gender-option {
            display: flex;
            align-items: center;
        }
        .gender-option input {
            margin-right: 8px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #357ABD;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        .login-link a {
            color: #4a90e2;
            text-decoration: none;
        }
        .user-type {
            display: flex;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }
        .user-type-option {
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .user-type-option.active {
            background-color: #4a90e2;
            color: white;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .left-panel {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="left-panel">
        <div class="logo-left">
            <img src="{{ asset('img/logoputih.png') }}" alt="KostHub Logo">
        </div>

        <h1>Temukan Kos Ideal Anda</h1>
        <p>Bergabunglah dengan ribuan pencari kos lainnya. Dapatkan akses ke berbagai pilihan kos dengan harga terbaik dan fasilitas lengkap.</p>
    </div>

    <div class="right-panel">
        <p class="tagline">Daftar akun pencari kos</p>

        <div class="user-type">
            <div class="user-type-option active">Pencari Kos</div>
            <div class="user-type-option" onclick="window.location.href='{{ route('register.pemilik') }}'">Pemilik Kos</div>
        </div>

        <form method="POST" action="{{ route('register.pencari') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                @error('name')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <div class="gender-group">
                    <div class="gender-option">
                        <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required>
                        <label for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="gender-option">
                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan">
                        <label for="perempuan">Perempuan</label>
                    </div>
                </div>
                @error('jenis_kelamin')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="kontak">Nomor Kontak</label>
                <input type="tel" id="kontak" name="kontak" placeholder="Masukkan nomor kontak" required>
                @error('kontak')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required>
                @error('email')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Buat password (min. 6 karakter)" required>
                @error('password')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
            </div>

            <button type="submit" class="btn">Daftar</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
        </div>
    </div>
</div>

<!-- ✅ SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "{{ session('error') }}",
        showConfirmButton: true
    });
</script>
@endif

</body>
</html>