<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class KosSearchController extends Controller
{
    private function filterQuery(Request $request)
    {
        $query = Kos::query();

        // Search lokasi
        if ($request->filled('alamat')) {
            $query->where('alamat', 'like', '%' . $request->alamat . '%');
        }

        // Filter tipe kos
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        // Harga min - max
        if ($request->filled('min')) {
            $query->where('harga_per_bulan', '>=', $request->min);
        }

        if ($request->filled('max')) {
            $query->where('harga_per_bulan', '<=', $request->max);
        }

        // Fasilitas (cek semua kolom fasilitas)
       if ($request->filled('fasilitas')) {
    foreach ($request->fasilitas as $f) {
        $query->where(function($q) use ($f) {
            $q->whereJsonContains('fasilitas_umum', $f)
              ->orWhereJsonContains('fasilitas_kamar', $f)
              ->orWhereJsonContains('fasilitas_kamar_mandi', $f);
        });
    }
}

        return $query->latest()->paginate(12)->withQueryString();
    }


    // ----------- VIEW BERBEDA -------------
    public function guestIndex(Request $request)
    {
        return view('guest.kos.index', [
            'kos' => $this->filterQuery($request)
        ]);
    }

    public function pencariIndex(Request $request)
    {
        return view('pencari.kos.index', [
            'kos' => $this->filterQuery($request)
        ]);
    }

    public function pemilikIndex(Request $request)
    {
        return view('pemilik.kos.index', [
            'kos' => $this->filterQuery($request)
        ]);
    }
}
