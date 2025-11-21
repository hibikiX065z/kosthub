<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KostController extends Controller
{
    public function index()
    {
        return view('kost.index');
    }

    public function show($id)
    {
        $kos = Kos::findOrFail($id);
        return view('kost.detail', compact('kos'));
    }

    // ============================
    //  BACKEND TAMBAH KOS
    // ============================
    public function create()
    {
        return view('kost.create');
    }

    // ============================
//  BACKEND EDIT KOS
// ============================
public function edit($id)
{
    $kos = Kos::findOrFail($id);
    return view('kost.edit', compact('kos'));
}

public function update(Request $request, $id)
{
    $kos = Kos::findOrFail($id);

    // VALIDASI
    $request->validate([
        'nama_kos' => 'required',
        'tipe' => 'required',
        'deskripsi' => 'nullable',
        'catatan' => 'nullable',

        'alamat' => 'required',
        'provinsi' => 'nullable',
        'kabupaten' => 'nullable',
        'kecamatan' => 'nullable',
        'catatan_alamat' => 'nullable',
        'latitude' => 'nullable',
        'longitude' => 'nullable',

        'foto_depan' => 'nullable|image|max:2048',
        'foto_jalan' => 'nullable|image|max:2048',
        'foto_kamar' => 'nullable|image|max:2048',
        'foto_kamar_mandi' => 'nullable|image|max:2048',
        'foto_lain' => 'nullable|image|max:2048',

        'fasilitas_umum' => 'nullable|array',
        'fasilitas_kamar' => 'nullable|array',
        'fasilitas_kamar_mandi' => 'nullable|array',
        'parkir' => 'nullable|array',

        'total_kamar' => 'required|integer',
        'kamar_tersedia' => 'required|integer',

        'harga_per_bulan' => 'required|integer',
        'biaya_tambahan' => 'nullable',
    ]);

    // ===========================
    //  UPDATE FOTO (jika ada file baru)
    // ===========================
    $fotoFields = [
        'foto_depan',
        'foto_jalan',
        'foto_kamar',
        'foto_kamar_mandi',
        'foto_lain'
    ];

    foreach ($fotoFields as $field) {
        if ($request->hasFile($field)) {
            // upload baru
            $newPath = $request->file($field)->store('kos', 'public');

            // hapus foto lama (optional)
            if ($kos->$field) {
                \Storage::disk('public')->delete($kos->$field);
            }

            $kos->$field = $newPath;
        }
    }

    // ===========================
    //  UPDATE DATA LAIN
    // ===========================
    $kos->update([
        'nama_kos' => $request->nama_kos,
        'tipe' => $request->tipe,
        'deskripsi' => $request->deskripsi,
        'catatan' => $request->catatan,

        'alamat' => $request->alamat,
        'provinsi' => $request->provinsi,
        'kabupaten' => $request->kabupaten,
        'kecamatan' => $request->kecamatan,
        'catatan_alamat' => $request->catatan_alamat,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,

        'fasilitas_umum' => $request->fasilitas_umum,
        'fasilitas_kamar' => $request->fasilitas_kamar,
        'fasilitas_kamar_mandi' => $request->fasilitas_kamar_mandi,
        'parkir' => $request->parkir,

        'total_kamar' => $request->total_kamar,
        'kamar_tersedia' => $request->kamar_tersedia,

        'harga_per_bulan' => $request->harga_per_bulan,
        'biaya_tambahan' => $request->biaya_tambahan,
    ]);

    return back()->with('success', 'Kost berhasil diperbarui!');
}


    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            // Step 1
            'nama_kos' => 'required',
            'tipe' => 'required',
            'deskripsi' => 'nullable',
            'catatan' => 'nullable',

            // Step 2
            'alamat' => 'required',
            'provinsi' => 'nullable',
            'kabupaten' => 'nullable',
            'kecamatan' => 'nullable',
            'catatan_alamat' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',

            // Step 3 Foto
            'foto_depan' => 'nullable|image|max:2048',
            'foto_jalan' => 'nullable|image|max:2048',
            'foto_kamar' => 'nullable|image|max:2048',
            'foto_kamar_mandi' => 'nullable|image|max:2048',
            'foto_lain' => 'nullable|image|max:2048',

            // Step 4
            'fasilitas_umum' => 'nullable|array',
            'fasilitas_kamar' => 'nullable|array',
            'fasilitas_kamar_mandi' => 'nullable|array',
            'parkir' => 'nullable|array',

            // Step 5
            'total_kamar' => 'required|integer',
            'kamar_tersedia' => 'required|integer',

            // Step 6
            'harga_per_bulan' => 'required|integer',
            'biaya_tambahan' => 'nullable',
        ]);

        // ===========================
        //  HANDLE FOTO (upload)
        // ===========================
        $foto_depan = $request->hasFile('foto_depan')
            ? $request->file('foto_depan')->store('kos', 'public')
            : null;

        $foto_jalan = $request->hasFile('foto_jalan')
            ? $request->file('foto_jalan')->store('kos', 'public')
            : null;

        $foto_kamar = $request->hasFile('foto_kamar')
            ? $request->file('foto_kamar')->store('kos', 'public')
            : null;

        $foto_kamar_mandi = $request->hasFile('foto_kamar_mandi')
            ? $request->file('foto_kamar_mandi')->store('kos', 'public')
            : null;

        $foto_lain = $request->hasFile('foto_lain')
            ? $request->file('foto_lain')->store('kos', 'public')
            : null;

        // ===========================
        //  SIMPAN DATA
        // ===========================
        Kos::create([
            'user_id' => Auth::id(),

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
            'catatan_alamat' => $request->catatan_alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

            // Step 3 Foto
            'foto_depan' => $foto_depan,
            'foto_jalan' => $foto_jalan,
            'foto_kamar' => $foto_kamar,
            'foto_kamar_mandi' => $foto_kamar_mandi,
            'foto_lain' => $foto_lain,

            // Step 4 Fasilitas (JSON)
            'fasilitas_umum' => $request->fasilitas_umum,
            'fasilitas_kamar' => $request->fasilitas_kamar,
            'fasilitas_kamar_mandi' => $request->fasilitas_kamar_mandi,
            'parkir' => $request->parkir,

            // Step 5
            'total_kamar' => $request->total_kamar,
            'kamar_tersedia' => $request->kamar_tersedia,

            // Step 6
            'harga_per_bulan' => $request->harga_per_bulan,
            'biaya_tambahan' => $request->biaya_tambahan,
        ]);

        

        return back()->with('success', 'Kost berhasil ditambahkan!');
    }
}
