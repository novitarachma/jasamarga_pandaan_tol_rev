<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Berita;
use App\Models\Pesan;
use App\Models\Visitor;

class HomeController extends Controller
{
    public function index(){
        $user = User::all();
        $berita = Berita::all();
        $pesan = Pesan::all();
        $visitor = Visitor::count();
        return view('admin.index', compact(
            'user', 'berita', 'pesan', 'visitor'
        ));
    }
}