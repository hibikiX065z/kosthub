<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Aktivitas;


class AuthController extends Controller
{
    // === LOGIN ===
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('dashboard/admin');
            } elseif ($user->role == 'pemilik') {
                return redirect('/');
            } else {
                return redirect('/');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // === REGISTER PEMILIK ===
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

        $newUser = User::create($validated);

         // === SIMPAN AKTIVITAS ===
        Aktivitas::create([
        'user_id' => $newUser->id,
        'kegiatan' => 'Registrasi akun sebagai Pemilik',
    ]);

        return redirect('login')->with('success', 'Akun pemilik berhasil dibuat!');
    }

    // === REGISTER PENCARI ===
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

        $newUser = User::create($validated);

        // === SIMPAN AKTIVITAS ===
        Aktivitas::create([
        'user_id' => $newUser->id,
        'kegiatan' => 'Registrasi akun sebagai Pencari',
        ]);

        return redirect('login')->with('success', 'Akun pencari berhasil dibuat!');
    }

    public function loginPost(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Redirect sesuai role
        if ($user->role === 'admin') {
            return redirect('dashboard.admin');
        } elseif ($user->role === 'pemilik') {
            return redirect('/');
        } elseif ($user->role === 'pencari') {
            return redirect('/');
        } else {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Role tidak dikenali.');
        }
    }

    return back()->with('error', 'Email atau password salah.');
}


    // === LOGOUT ===
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
};