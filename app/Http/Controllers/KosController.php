<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KosController extends Controller
{
    // HALAMAN LIST
    public function index()
    {
        return view('kost.index');
    }

    // HALAMAN DETAIL
    public function show($id)
    {
        $kos = Kos::findOrFail($id);
        return view('kost.detail', compact('kos'));
    }

    // CREATE VIEW
    public function create()
    {
        return view('kost.create');
    }

    // EDIT VIEW
    public function edit($id)
    {
        $kos = Kos::findOrFail($id);
        return view('kost.edit', compact('kos'));
    }


    // =========================
    // STORE DATA KOS BARU
    // =========================
    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        // Handle Upload Foto
        foreach ($this->fotoFields() as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('kos', 'public');
            }
        }

        $data['user_id'] = Auth::id();

        Kos::create($data);

        return back()->with('success', 'Kost berhasil ditambahkan!');
    }


    // =========================
    // UPDATE DATA KOS
    // =========================
    public function update(Request $request, $id)
    {
        $kos = Kos::findOrFail($id);
        $data = $this->validatedData($request);

        // UPDATE FOTO
        foreach ($this->fotoFields() as $field) {
            if ($request->hasFile($field)) {

                // Hapus foto lama
                if ($kos->$field) {
                    Storage::disk('public')->delete($kos->$field);
                }

                // Upload baru
                $data[$field] = $request->file($field)->store('kos', 'public');
            }
        }

        $kos->update($data);

        return back()->with('success', 'Kost berhasil diperbarui!');
    }


    // =========================
    // VALIDATION (Reusable)
    // =========================
    private function validatedData(Request $request)
    {
        return $request->validate([
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

            // Step 4 Fasilitas (array)
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
    }

    // Foto Fields reusable
    private function fotoFields()
    {
        return [
            'foto_depan',
            'foto_jalan',
            'foto_kamar',
            'foto_kamar_mandi',
            'foto_lain'
        ];
    }
}
