<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;

class KosSearchController extends Controller
{
    public function search(Request $request)
    {
        $lokasi = $request->get('lokasi');

        $kos = Kos::where('lokasi', 'like', '%' . $lokasi . '%')->get();

        return view('kos.search', compact('kos', 'lokasi'));
    }
}
