<?php

namespace App\Http\Controllers\User;

use App\Models\Galeri;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\User\GaleriPasswords;

class GaleriController extends Controller
{
    public function index()
    {
        $post = Galeri::all();
        return view('user.galeri')->with('post', $post);
    }
}
