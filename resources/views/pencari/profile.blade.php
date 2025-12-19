@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="profile-card">
    <div class="profile-container">
        <div class="avatar-section">
            <div class="avatar-wrapper">
                {{-- Gunakan asset() untuk gambar lokal atau URL luar --}}
                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=200&h=200&auto=format&fit=crop" alt="Avatar" class="avatar-img">
                <div class="camera-icon">
                    <i class="fa-solid fa-camera"></i>
                </div>
            </div>
        </div>

        <div class="form-section">
            <form action="/update-profile" method="POST">
                @csrf {{-- Wajib di Laravel untuk keamanan --}}
                <div class="input-grid">
                    <div class="input-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" value="Tom Cruise">
                    </div>
                    <div class="input-group">
                        <label>Nomor Kontak</label>
                        <input type="text" name="phone" value="089668633677">
                    </div>
                    <div class="input-group">
                        <label>Alamat Email</label>
                        <input type="email" name="email" value="tomcruisecuy@gmail.com">
                    </div>
                    <div class="input-group">
                        <label>Password</label>
                        <div class="password-wrapper">
                            <input type="password" name="password" value="password123">
                            <i class="fa-solid fa-eye-slash"></i>
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-update">Update</button>
                    <button type="button" class="btn btn-edit">Edit Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection