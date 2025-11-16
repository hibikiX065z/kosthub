<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kos;
use App\Models\Aktivitas;
use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
    return view('dashboard.admin', [
        'title' => 'Dashboard Admin',
        'jumlahPengguna' => User::whereIn('role', ['pencari', 'pemilik'])->count(),
        'kosAktif' => Kos::where('status', 'aktif')->count(),
        'jumlahVerifikasi' => Kos::where('status', 'pending')->count(),
        'aktivitas' => Aktivitas::latest()->limit(5)->get()
        ]);
    }

}