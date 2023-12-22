<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;

class MessageController extends Controller
{
    public function index()
    {
        $pesan = Pesan::orderBy('id', 'desc')->paginate(10);
        return view('admin.pesan.index', compact('pesan'));
    }

    public function delete($id)
    {
        $pesan = Pesan::find($id);
        $pesan->forceDelete();
        return redirect()->route('message.index')->with('status', 'Data all message permanently deleted!');
    }
    
    public function deleteAll()
    {
        $pesan = Pesan::all();
        $pesan->forceDelete();
        return redirect()->route('message.index')->with('status', 'Data all message permanently deleted!');
    }
}