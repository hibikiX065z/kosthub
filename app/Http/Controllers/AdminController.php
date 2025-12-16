<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kos;
use App\Models\Aktivitas;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        return view('dashboard.admin', [
            'title' => 'Dashboard Admin',
            'jumlahPengguna' => User::whereIn('role', ['pencari', 'pemilik'])->count(),
            'kosAktif' => Kos::where('status', 'approved')->count(),
            'jumlahVerifikasi' => Kos::whereIn('status', ['approved', 'rejected'])->count(),
            'aktivitas' => Aktivitas::latest()->limit(10)->get(),
            'menungguVerifikasi' => Kos::where('status', 'pending')->count(),
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
            ->when(request('nama_kos'), fn($q) => $q->where('nama_kos', 'like', '%' . request('nama_kos') . '%'))
            ->when(request('alamat'), fn($q) => $q->where('alamat', 'like', '%' . request('alamat') . '%'))
            ->when(request('status'), fn($q) => $q->where('status', request('status')))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.kost', compact('kos'));
    }


    public function approve($id)
    {
        $kos = Kos::findOrFail($id);
        $kos->status = 'approved';   // pastikan enum sesuai di tabel kos
        $kos->save();

        Aktivitas::create([
            'user_id' => Auth::id(),
            'kegiatan' => "Menyetujui kos: {$kos->nama_kos}"
        ]);

        return back()->with('success', 'Kos berhasil disetujui dan sekarang aktif 👍');
    }


    public function reject($id)
    {
        $kos = Kos::findOrFail($id);
        $kos->status = 'rejected';   // HARUS sesuai enum tabel kos
        $kos->save();

        Aktivitas::create([
            'user_id' => Auth::id(),
            'kegiatan' => "Menolak pengajuan kos: {$kos->nama_kos}"
        ]);

        return back()->with('error', 'Pengajuan kos ditolak ❌');
    }

    public function destroy($id)
    {
        $kos = Kos::findOrFail($id);
        $namaKos = $kos->nama_kos;
        $kos->delete();

        Aktivitas::create([
            'user_id' => Auth::id(),
            'kegiatan' => "Menghapus kos: {$namaKos}"
        ]);

        return back()->with('warning', 'Kos telah dihapus ⚠️');
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
