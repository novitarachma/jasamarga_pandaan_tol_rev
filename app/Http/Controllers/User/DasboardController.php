<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class DasboardController extends Controller
{
    public function index(){
        $berita = Berita::all();
        return view('index', compact(
            'berita'
        ));
    }
}