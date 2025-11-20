<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Aktivitas;


class AuthController extends Controller
{
    // FORM LOGIN
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // LOGIN YANG BENAR
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect('/admin');
            } elseif ($user->role === 'pemilik') {
                return redirect('/pemilik');
            } elseif ($user->role === 'pencari') {
                return redirect('/pencari');
            }

            // Role tidak valid
            Auth::logout();
            return redirect('login')->with('error', 'Role tidak dikenali.');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // ============================
    // REGISTER PEMILIK
    // ============================
    public function showRegisterPemilik()
    {
        return view('auth.register-pemilik');
    }

    public function registerPemilik(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'kontak' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = 'pemilik';

        $user = User::create($validated);
        $user->email_verified_at = now();
        $user->save();

        Aktivitas::create([
            'user_id' => $user->id,
            'kegiatan' => 'Registrasi akun sebagai Pemilik',
        ]);

        return redirect('login')->with('success', 'Akun pemilik berhasil dibuat!');
    }

    // ============================
    // REGISTER PENCARI
    // ============================
    public function showRegisterPencari()
    {
        return view('auth.register-pencari');
    }

    public function registerPencari(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'kontak' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = 'pencari';

        $user = User::create($validated);
        $user->email_verified_at = now();
        $user->save();

        Aktivitas::create([
            'user_id' => $user->id,
            'kegiatan' => 'Registrasi akun sebagai Pencari',
        ]);

        return redirect('login')->with('success', 'Akun pencari berhasil dibuat!');
    }

    // PROFILE
    public function profilePemilik()
    {
        $user = Auth::user();
        return view('pemilik.profile', compact('user'));
    }

    public function profilePencari()
    {
        $user = Auth::user();
        return view('pencari.profile', compact('user'));
    }

    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
