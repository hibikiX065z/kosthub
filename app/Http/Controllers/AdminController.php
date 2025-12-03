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

    // tampilkan daftar kos (mis. hanya pending / semua)
    public function kost()
    {
        $kos = Kos::query()
            ->when(request('nama_kos'), fn($q) => $q->where('nama_kos', 'like', '%'.request('nama_kos').'%'))
            ->when(request('lokasi'), fn($q) => $q->where('lokasi', 'like', '%'.request('lokasi').'%'))
            ->get();

        return view('dashboard.kost', compact('kos'));
    }

    public function approve($id)
    {
        $kos = Kos::findOrFail($id);
        $kos->status = 'approved';
        $kos->save();

        return back()->with('success', 'Kos approved!');
    }

    public function reject($id)
    {
        $kos = Kos::findOrFail($id);
        $kos->status = 'rejected';
        $kos->save();

        return back()->with('success', 'Kos rejected!');
    }

    public function destroy($id)
    {
        Kos::findOrFail($id)->delete();
        return back()->with('success', 'Kos berhasil dihapus.');
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
