<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Visitor;

class DasboardController extends Controller
{
    public function index(){
        $berita = Berita::latest()->paginate(3);
        $visitor = Visitor::count();
        return view('index', compact(
            'berita', 'visitor'
        ));
    }
}