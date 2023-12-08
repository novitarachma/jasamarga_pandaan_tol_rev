<?php

namespace App\Http\Controllers\User;

use App\Models\Galeri;
use App\Models\Tahun;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    public function index()
    {
        $post = Galeri::all();
        $tahun = Tahun::all();
        return view('user.galeri', compact('post','tahun'));
    }
}
