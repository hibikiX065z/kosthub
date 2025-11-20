<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KostController extends Controller
{
   public function index()
    {
        return view('kost.index');
    }

    public function show($id)
    {
        return view('kost.detail', ['id' => $id]);
    }
}
