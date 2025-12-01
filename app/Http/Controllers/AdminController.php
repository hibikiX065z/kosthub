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

    public function pengguna()
    {
        $users = User::whereIn('role', ['pencari', 'pemilik'])->get();
        return view('dashboard.pengguna', [
            'title' => 'Data Pengguna',
            'users' => $users
        ]);
    }

    public function kost()
    {
        $kosts = Kos::all();
        return view('dashboard.kost', [
            'title' => 'Data Kost',
            'kosts' => $kosts
        ]);
    }

    public function laporan()
    {
        $reports = Report::all();
        return view('dashboard.laporan', [
            'title' => 'Data Laporan',
            'reports' => $reports
        ]);
    }

    public function aktivitas()
    {
        $aktivitas = Aktivitas::latest()->get();
        return view('dashboard.aktivitas', [
            'title' => 'Data Aktivitas',
            'aktivitas' => $aktivitas
        ]);
    }

    public function pengaturan()
    {
        return view('dashboard.pengaturan', [
            'title' => 'Pengaturan Admin'
        ]);
    }
}