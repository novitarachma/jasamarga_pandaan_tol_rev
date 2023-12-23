<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Http\Requests\StorePesanRequest;

class PesanController extends Controller
{
    public function index()
    {
        return view('user.contact');
    }
    
    public function addMessage(Pesan $pesan, StorePesanRequest $request)
    {
        $input = $request->all();
        $pesan->create($input);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('contact')->with('success', 'Pesan Berhasil Ditambahkan');
    }
}