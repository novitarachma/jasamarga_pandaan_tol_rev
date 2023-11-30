<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TarifTol;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Imports\TarifTolImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\FileUploadService;
use App\Services\TrashService;
use App\Http\Requests\StoreTarifTolRequest;
use App\Http\Requests\ImportFileRequest;

class TarifTolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = TarifTol::all();
        return view('admin.tarif.index', compact(
            'datas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tarif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     
    public function store(StoreTarifTolRequest $request, TarifTol $tarif)
    {
        $input = $request->all();
        $tarif->create($input);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.tarif.index')->with('success', 'Tarif Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tarif = TarifTol::where('id', $id)->first();
        return view('admin.tarif.detail', compact('tarif'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarif = TarifTol::where('id', $id)->first();
        return view('admin.tarif.edit', compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTarifTolRequest $request, TarifTol $tarif)
    {
        $input = $request->all();
        $tarif->update($input);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.tarif.index')->with('success', 'Tarif Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TarifTol $tarif)
    {
        $tarif->delete();
        
        return redirect()->route('admin.tarif.index')->with('success', 'Tarif Berhasil Dihapus');
    }

    public function trash()
    {
        $tarif = TarifTol::onlyTrashed()->paginate(10);
        return view('admin.tarif.trash', ['tarif' => $tarif]);
    }

    public function restore($id, TrashService $trashService)
    {
        $tarif = TarifTol::withTrashed()->findOrFail($id);
        return $trashService->restore($tarif);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $tarif = TarifTol::withTrashed()->findOrFail($id);
        return $trashService->delete($tarif);
    }
}