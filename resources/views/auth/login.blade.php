<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOSTHÜB - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: url('{{asset('img/bg.png')}}');
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            display: flex;
            max-width: 1000px;
            width: 90%;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .welcome-section {
            flex: 1;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                        url('{{ asset('img/gambareg.png') }}');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo img {
            width: 120px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .welcome-content h2 {
            font-size: 2.2rem;
            margin-bottom: 15px;
        }

        .welcome-content p {
            line-height: 1.6;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .learn-now-btn {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #ff9933;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 150px;
        }

        .learn-now-btn:hover {
            background-color: #e67300;
        }

        .login-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .login-form-box {
            width: 100%;
            max-width: 350px;
        }

        .login-form-box h3 {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #ff9933;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #ff9933;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #e67300;
        }

        .separator {
            height: 1px;
            background-color: #ddd;
            margin: 20px 0;
        }

        .google-signin-btn {
            width: 100%;
            padding: 12px;
            background-color: #db4437;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .google-signin-btn:hover {
            background-color: #c23321;
        }

        .register-link {
            text-align: center;
            margin-bottom: 15px;
            color: #555;
        }

        .register-link a {
            color: #ff9933;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            .login-container {
                flex-direction: column;
            }

            .welcome-section {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="welcome-section">
            <div class="logo">
                <img src="{{ asset('img/logoputih.png') }}" alt="Logo Kosthüb">
            </div>
            <div class="welcome-content">
                <h2>Welcome</h2>
                <p>KOSTHÜB membantu masyarakat menemukan hunian yang nyaman, aman, dan sesuai kebutuhan hanya dalam beberapa klik.</p>
                <p>Dapatkan info lengkap mulai dari harga, fasilitas, lokasi, hingga kontak pemilik kos dengan mudah dan cepat.</p>
                <button class="learn-now-btn" onclick="window.location.href='{{ route('register.pencari') }}'">Learn Now</button>
            </div>
        </div>

        <div class="login-section">
            <div class="login-form-box">
                <h3>Sign In</h3>

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                     <label for="email">Email</label>
                     <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email" required>
                     @error('email')
                    <small style="color:red;">{{ $message }}</small>
                     @enderror

                     <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="password" required>
                     @error('password')
                        <small style="color:red;">{{ $message }}</small>
                        @enderror
                    
                    
                    <p class="register-link">
                        Belum punya akun pencari? 
                        <a href="{{ route('register.pencari') }}">Daftar di sini</a>
                    </p>
                    
                    <button type="submit" class="submit-btn">Login</button>

                    <div class="separator"></div>

                    <button type="button" class="google-signin-btn">
                        <i class="fab fa-google"></i> Sign in with Google
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: {!! json_encode(session('success')) !!},
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: {!! json_encode(session('error')) !!},
                showConfirmButton: true
            });
        @endif
    </script>
</body>
</html>