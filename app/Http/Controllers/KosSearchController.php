<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;

class KosSearchController extends Controller
{
    public function search(Request $request)
    {
       $lokasi = $request->lokasi;

    $query = Kos::query();

    // Tetap filter berdasarkan lokasi yang dicari
    if ($request->filled('lokasi')) {
        $query->where('lokasi', 'like', '%' . $lokasi . '%');
    }

    // Filter harga
    if ($request->filled('harga_min')) {
        $query->where('harga', '>=', $request->harga_min);
    }

    if ($request->filled('harga_max')) {
        $query->where('harga', '<=', $request->harga_max);
    }

    // Filter tipe
    if ($request->filled('tipe')) {
        $query->where('tipe', $request->tipe);
    }

    // Filter fasilitas
    if ($request->filled('fasilitas')) {
        foreach ($request->fasilitas as $fas) {
            $query->where('fasilitas', 'like', '%' . $fas . '%');
        }
    }

    $kos = $query->get();

    return view('kos.search', compact('kos', 'lokasi', 'request'));
    }
}
