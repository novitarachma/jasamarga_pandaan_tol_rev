<?php

namespace App\Http\Controllers\User;

use App\Models\Dokumen;
use App\Http\Controllers\Controller;

class DokumenController extends Controller
{
    public function index()
    {
        $post = Dokumen::all();
        return view('dokumen_perusahaan.perusahaan')->with('post', $post);
    }
}
