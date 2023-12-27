<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahun;
use App\Models\Bulan;
use App\Models\Divisi;

class SettingsController extends Controller
{
    public function index()
    {
        $tahun = Tahun::all();
        $bulan = Bulan::all();
        $divisi = Divisi::all();
        return view('admin.settings.index', compact(
            'tahun', 'bulan', 'divisi'
        ));
    }

    public function trash()
    {
        $tahun = Tahun::onlyTrashed()->paginate();
        $bulan = Bulan::onlyTrashed()->paginate();
        $divisi = Divisi::onlyTrashed()->paginate();
        return view('admin.settings.trash', compact('tahun', 'bulan', 'divisi'));
    }
}