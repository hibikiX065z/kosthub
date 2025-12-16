<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

<nav class="navbar">
    <img src="/img/logo_hitam.png" class="logo">

    <div class="custom-header">

        <div class="d-flex align-items-center" style="gap: 10px;">
            <a href="{{ route('pemilik.landing') }}">Home</a>
            <a href="{{ route('pemilik.edit-kos') }}">Kost</a>
            <a href="{{ route('pemilik.tambah-kos') }}">Tambah Kos</a>
            <a href="{{ route('pemilik.about') }}">About</a>
        </div>

        <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item dropdown ms-3">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <img src="{{ Auth::user()->foto_profil ?? asset('img/default-user.png') }}" class="rounded-circle"
                        width="38" height="38" style="object-fit: cover;">
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('pemilik.profile') }}">
                            <i class="bi bi-person-circle me-2"></i> Profil
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</nav>