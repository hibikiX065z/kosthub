<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikController extends Controller
{
    public function index()
    {
        $kos = Kos::where('user_id', Auth::id())->get();
        return view('pemilik.kos', compact('kos'));
    }

    public function create()
    {
        return view('pemilik.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nama_kos' => 'required|string|max:255',
            'tipe' => 'required|string',
            'alamat' => 'required|string',
            'harga_per_bulan' => 'required|numeric',
            'total_kamar' => 'required|integer',
            'kamar_tersedia' => 'required|integer',
            'foto_depan' => 'required|image',
        ]);

        // ===========================
        // HANDLE FILE UPLOAD
        // ===========================
        $foto_depan = $request->file('foto_depan')?->store('kos/foto_depan', 'public');
        $foto_jalan = $request->file('foto_jalan')?->store('kos/foto_jalan', 'public');
        $foto_kamar = $request->file('foto_kamar')?->store('kos/foto_kamar', 'public');
        $foto_kamar_mandi = $request->file('foto_kamar_mandi')?->store('kos/foto_kamar_mandi', 'public');
        $foto_lain = $request->file('foto_lain')?->store('kos/foto_lain', 'public');

        // ===========================
        // SIMPAN DATA
        // ===========================
        Kos::create([
            'user_id' => Auth::id(),

            // Informasi dasar
            'nama_kos' => $request->nama_kos,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'catatan' => $request->catatan,

            // Lokasi
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'catatan_alamat' => $request->catatan_alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

            // Foto
            'foto_depan' => $foto_depan,
            'foto_jalan' => $foto_jalan,
            'foto_kamar' => $foto_kamar,
            'foto_kamar_mandi' => $foto_kamar_mandi,
            'foto_lain' => $foto_lain,

            // Fasilitas → convert string to array
            'fasilitas_umum' => $request->fasilitas_umum ? explode(',', $request->fasilitas_umum) : [],
            'fasilitas_kamar' => $request->fasilitas_kamar ? explode(',', $request->fasilitas_kamar) : [],
            'fasilitas_kamar_mandi' => $request->fasilitas_kamar_mandi ? explode(',', $request->fasilitas_kamar_mandi) : [],
            'parkir' => $request->parkir ? explode(',', $request->parkir) : [],

            // Kamar
            'total_kamar' => $request->total_kamar,
            'kamar_tersedia' => $request->kamar_tersedia,

            // Harga
            'harga_per_bulan' => $request->harga_per_bulan,
            'biaya_tambahan' => $request->biaya_tambahan,
        ]);

        

        return redirect()->route('pemilik')
            ->with('success', 'Kos berhasil ditambahkan!');
    }
}
