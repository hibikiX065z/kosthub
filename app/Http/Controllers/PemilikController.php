<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function index()
    {
        $kos = Kos::where('pemilik_id', auth()->id())->get();
        return view('pemilik.kost', compact('kos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kos' => 'required',
            'harga' => 'required|numeric',
            'alamat' => 'required',
        ]);

        // ambil ID user login
        $validated['pemilik_id'] = auth()->id();

        Kos::create([
            'pemilik_id' => $validated['pemilik_id'], // ⬅ tambah ini
            'nama_kos' => $request->nama_kos,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'catatan' => $request->catatan,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'catatan_lokasi' => $request->catatan_lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

            'foto_depan' => $request->foto_depan ? $request->foto_depan->store('foto_kos') : null,
            'foto_jalan' => $request->foto_jalan ? $request->foto_jalan->store('foto_kos') : null,
            'foto_kamar' => $request->foto_kamar ? $request->foto_kamar->store('foto_kos') : null,
            'foto_mandi' => $request->foto_mandi ? $request->foto_mandi->store('foto_kos') : null,
            'foto_lain' => $request->foto_lain ? $request->foto_lain->store('foto_kos') : null,

            'fasilitas_umum' => $request->fasilitas_umum,
            'fasilitas_kamar' => $request->fasilitas_kamar,
            'fasilitas_mandi' => $request->fasilitas_mandi,
            'parkir' => $request->parkir,

            'total_kamar' => $request->total_kamar,
            'kamar_tersedia' => $request->kamar_tersedia,

            'harga' => $request->harga,
            'biaya_tambahan' => $request->biaya_tambahan,

            'status' => 'pending', // default agar muncul di admin
        ]);

        return redirect()
            ->route('pemilik.kost')
            ->with('success', 'Kost berhasil ditambahkan dan menunggu persetujuan admin!');
    }



    public function update(Request $request, $id)
    {
        $kos = Kos::findOrFail($id);

        $request->validate([
            'nama_kos' => 'required',
            'lokasi' => 'required',
            'harga' => 'required|integer',
            'tipe' => 'required',
            'fasilitas' => 'required|array',
        ]);

        $kos->update([
            'nama_kos' => $request->nama_kos,
            'lokasi' => $request->lokasi,
            'harga' => $request->harga,
            'tipe' => $request->tipe,
            'fasilitas' => json_encode($request->fasilitas),
        ]);

        return back()->with('success', 'Kos berhasil diupdate');
    }
}
