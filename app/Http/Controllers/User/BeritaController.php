<?php

namespace App\Http\Controllers\User;

use App\Models\Berita;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index()
    {
        $ber = Berita::all();
        return view('user.berita')->with('ber', $ber);
    }

    public function show(string $id)
    {
        $data = Berita::where('id', $id)->first();
        return view('user.detail-berita', compact('data'));
    }
    
}
