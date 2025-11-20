@extends('layouts.footer')

@section('content')

<div class="container py-5">
    <h3 class="mb-4">Profil Saya</h3>

    <div class="card shadow-sm p-4" style="max-width: 600px;">
        <div class="text-center mb-4">
            <img src="{{ $user->foto_profil ?? asset('img/default-user.png') }}"
                 width="120" height="120"
                 class="rounded-circle border"
                 style="object-fit: cover;">
        </div>

        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>

        <a href="#" class="btn btn-primary mt-3">Edit Profil</a>
    </div>

</div>

@endsection
