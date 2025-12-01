<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kos;
use App\Models\Aktivitas;
use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin', [
            'title' => 'Dashboard Admin',

            // data stat
            'jumlahPengguna'      => User::whereIn('role', ['pencari', 'pemilik'])->count(),
            'kosAktif'            => Kos::where('status', 'aktif')->count(),
            'jumlahVerifikasi'    => Kos::where('status', 'pending')->count(),

            // TAMBAHKAN INI
            'menungguVerifikasi'  => Kos::where('status', 'pending')->count(),
            'pendingReports'      => Report::where('status', 'pending')->count(),

            // aktivitas terbaru
            'aktivitas' => Aktivitas::with('user')->latest()->limit(10)->get(),
        ]);
    }
}
