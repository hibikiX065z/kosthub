<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function index()
    {
        $kos = Kos::where('pemilik_id', auth()->id())->get();
        return view('pemilik.index', compact('kos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kos' => 'required',
            'lokasi' => 'required',
            'harga' => 'required|integer',
            'tipe' => 'required',
            'fasilitas' => 'required|array',
        ]);

        Kos::create([
            'nama_kos' => $request->nama_kos,
            'lokasi' => $request->lokasi,
            'harga' => $request->harga,
            'tipe' => $request->tipe,
            'fasilitas' => json_encode($request->fasilitas),
            'pemilik_id' => auth()->id(),
        ]);

        return back()->with('success', 'Kos berhasil ditambahkan');
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
