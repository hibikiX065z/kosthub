<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KosController extends Controller
{
    public function index()
    {
        $kos = Kos::where('user_id', auth()->id())->paginate(10);
        return view('pemilik.kos.index', compact('kos'));
    }
    public function pencariindex()
    {
        $kos = Kos::where('user_id', auth()->id())->paginate(10);
        return view('pencari.kos.index', compact('kos'));
    }
    // Contoh di KosController show() method
public function show($id)
{
    $kos = Kos::findOrFail($id);

    // Decode semua fasilitas
    $kos->fasilitas_umum = json_decode($kos->fasilitas_umum, true);
    $kos->fasilitas_kamar = json_decode($kos->fasilitas_kamar, true);
    $kos->fasilitas_kamar_mandi = json_decode($kos->fasilitas_kamar_mandi, true);
    $kos->parkir = json_decode($kos->parkir, true);

    return view('pencari.kos.show', compact('kos'));
}


    public function create()
    {
        return view('pemilik.kos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kos' => 'required',
            'tipe' => 'required',
            'alamat' => 'required',
            'harga_per_bulan' => 'required|numeric',
            'total_kamar' => 'required|numeric',
            'kamar_tersedia' => 'required|numeric',
            'foto_depan' => 'required|image|mimes:jpg,jpeg,png',
            'foto_jalan' => 'nullable|image|mimes:jpg,jpeg,png',
            'foto_kamar' => 'nullable|image|mimes:jpg,jpeg,png',
            'foto_kamar_mandi' => 'nullable|image|mimes:jpg,jpeg,png',
            'foto_lain' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        // Simpan fasilitas sebagai JSON
    foreach (['fasilitas_umum','fasilitas_kamar','fasilitas_kamar_mandi','parkir'] as $field) {
        if(isset($data[$field])) {
            $data[$field] = json_encode($data[$field]);
        } else {
            $data[$field] = json_encode([]);
        }
    }

    // Upload foto (contoh untuk foto_depan)
    if($request->hasFile('foto_depan')){
        $data['foto_depan'] = $request->file('foto_depan')->store('kos','public');
    }

    if($request->hasFile('foto_jalan')){
        $data['foto_jalan'] = $request->file('foto_jalan')->store('kos','public');
    }

    if($request->hasFile('foto_kamar')){
        $data['foto_kamar'] = $request->file('foto_kamar')->store('kos','public');
    }

    if($request->hasFile('foto_kamar_mandi')){
        $data['foto_kamar_mandi'] = $request->file('foto_kamar_mandi')->store('kos','public');
    }

    if($request->hasFile('foto_lain')){
        $data['foto_lain'] = $request->file('foto_lain')->store('kos','public');
    }

    Kos::create($data);

    return redirect()->route('pemilik.kos.index')->with('success', 'Kos berhasil ditambahkan!');
}

    public function edit($id)
    {
        $kos = Kos::where('user_id', Auth::id())->findOrFail($id);
        return view('pemilik.kos.edit', compact('kos'));
    }

    public function update(Request $request, $id)
    {
        $kos = Kos::where('user_id', Auth::id())->findOrFail($id);

       // Ambil semua data
$data = $request->all();

// Fasilitas (cek semua kolom fasilitas)
foreach (['fasilitas_umum','fasilitas_kamar','fasilitas_kamar_mandi','parkir'] as $field) {
    if (isset($data[$field])) {
        // Kalau array (dari checkbox), langsung pakai array_map trim
        if (is_array($data[$field])) {
            $data[$field] = array_map('trim', $data[$field]);
        }
        // Kalau string (dari input teks), explode dulu
        else if (is_string($data[$field])) {
            $data[$field] = array_map('trim', explode(',', $data[$field]));
        }
    } else {
        $data[$field] = []; // default kosong supaya tidak null
    }
}

// Update kos
$kos->update($data);


        return redirect()->route('pemilik.kos.index')->with('success', 'Kos berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kos = Kos::where('user_id', Auth::id())->findOrFail($id);

        // Hapus semua foto dari storage
        foreach (['foto_depan','foto_jalan','foto_kamar','foto_kamar_mandi','foto_lain'] as $foto) {
            if ($kos->$foto && Storage::disk('public')->exists($kos->$foto)) {
                Storage::disk('public')->delete($kos->$foto);
            }
        }

        $kos->delete();

        return redirect()->route('pemilik.kos.index')->with('success', 'Kos berhasil dihapus!');
    }
}
