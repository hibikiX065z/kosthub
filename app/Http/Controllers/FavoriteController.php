<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle($kos_id)
    {
        $user = Auth::user();

        if ($user->favorites()->where('kos_id', $kos_id)->exists()) {
            $user->favorites()->detach($kos_id);
            return back()->with('success', 'Berhasil dihapus dari favorit.');
        }

        $user->favorites()->attach($kos_id);
        return back()->with('success', 'Berhasil ditambahkan ke favorit!');
    }

    public function index()
    {
        $favorites = Auth::user()->favorites()->paginate(9);

        return view('pencari.kos.favorites', compact('favorites'));
    }
}
