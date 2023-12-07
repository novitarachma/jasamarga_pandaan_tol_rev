<?php

namespace App\Http\Controllers\User;

use App\Models\Karyawan;
use App\Models\Divisi;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\User\Karyawann;

class KaryawanController extends Controller
{
    public function index()
    {
        $kar = Karyawan::all();
        return view('dokumen_karyawan.karyawan')->with('kar', $kar);

        if($divisis == $kar->divisis->name){
            $kar = Karyawan:: where('divisi_id', $kar->divisis->id)->first();
            return view('dokumen_karyawan.karyawan', compact('kar'));
        }
    }
}
