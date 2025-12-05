<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    // =========================
    // LIST KOS PEMILIK
    // =========================
    public function index()
    {
        $kos = Kos::where('pemilik_id', Auth::id())->get();
        return view('pemilik.kost', compact('kos'));
    }

    // =========================
    // FORM TAMBAH KOS
    // =========================
    public function create()
    {
        return view('pemilik.tambah-kos');
    }

    // =========================
    // SIMPAN KOS BARU
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_kos' => 'required',
            'tipe' => 'required',
            'alamat' => 'required',
            'harga_per_bulan' => 'required|numeric'
        ]);

        Kos::create([
            'pemilik_id' => Auth::id(),

            // Step 1
            'nama_kos' => $request->nama_kos,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'catatan' => $request->catatan,

            // Step 2
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'catatan_alamat' => $request->catatan_alamat, // FIXED NAME

            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

            // Step Foto
            'foto_depan' => $request->file('foto_depan')?->store('foto_kos'),
            'foto_jalan' => $request->file('foto_jalan')?->store('foto_kos'),
            'foto_kamar' => $request->file('foto_kamar')?->store('foto_kos'),
            'foto_kamar_mandi' => $request->file('foto_kamar_mandi')?->store('foto_kos'),
            'foto_lain' => $request->file('foto_lain')?->store('foto_kos'),

            // Step Fasilitas
            'fasilitas_umum' => $request->fasilitas_umum,
            'fasilitas_kamar' => $request->fasilitas_kamar,
            'fasilitas_kamar_mandi' => $request->fasilitas_kamar_mandi,
            'parkir' => $request->parkir,

            // Step 5
            'total_kamar' => $request->total_kamar,
            'kamar_tersedia' => $request->kamar_tersedia,

            // Step 6
            'harga_per_bulan' => $request->harga_per_bulan, // FIXED
            'biaya_tambahan' => $request->biaya_tambahan,

            // Status default
            'status' => 'pending',
        ]);


        return redirect()->route('pemilik.kost')
            ->with('success', 'Kost berhasil ditambahkan dan menunggu persetujuan admin!');
    }


    // =========================
    // EDIT KOS
    // =========================
    public function edit($id)
    {
        $kos = Kos::where('pemilik_id', Auth::id())->findOrFail($id);
        return view('pemilik.edit-kos', compact('kos'));
    }

    // =========================
    // UPDATE KOS
    // =========================
    public function update(Request $request, $id)
    {
        $kos = Kos::where('pemilik_id', Auth::id())->findOrFail($id);

        $request->validate([
            'nama_kos' => 'required|string',
            'alamat' => 'required|string',
            'total_kamar' => 'required|numeric',
            'kamar_tersedia' => 'required|numeric',
            'harga_per_bulan' => 'required|numeric',
        ]);

        $kos->update([
            'nama_kos' => $request->nama_kos,
            'alamat' => $request->alamat,
            'total_kamar' => $request->total_kamar,
            'kamar_tersedia' => $request->kamar_tersedia,
            'harga_per_bulan' => $request->harga_per_bulan,
        ]);

        return redirect()->route('pemilik.kost')->with('success', 'Kost berhasil diperbarui!');
    }


    // =========================
    // DELETE KOS
    // =========================
    public function destroy($id)
    {
        $kos = Kos::where('pemilik_id', Auth::id())->findOrFail($id);
        $kos->delete();

        return redirect()->route('pemilik.kost')->with('success', 'Kost berhasil dihapus');
    }
}
