<?php

namespace App\Http\Controllers\User;

use App\Models\Galeri;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    public function index()
    {
        $post = Galeri::all();
        return view('user.galeri')->with('post', $post);
    }
}
