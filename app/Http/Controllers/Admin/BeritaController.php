<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Services\FileUploadService;
use App\Http\Requests\StoreBeritaRequest;
use App\Services\TrashService;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Berita::all();
        return view('admin.berita.index', compact(
            'datas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     
    public function store(Berita $berita, StoreBeritaRequest $request, FileUploadService $fileUploadService)
    {
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $fileUploadService->uploadImage($foto);
        } else{
            $fotoPath = null;
        }
        
        $input = $request->all();
        $input['foto'] = $fotoPath;
        $berita->create($input);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Berita $berita)
    {
        $berita->where('id', $id)->first();
        return view('admin.berita.detail', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Berita $berita)
    {
        $berita->where('id', $id)->first();
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Berita $berita, StoreBeritaRequest $request, FileUploadService $fileUploadService)
    {
        if($berita->foto && file_exists(storage_path('./app/public/'. $berita->foto))){
            Storage::delete(['public/', $berita->foto]);
        }
        
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $fileUploadService->uploadImage($foto);
        } else{
            $fotoPath = null;
        }
        
        $input = $request->all();
        $input['foto'] = $fotoPath;
        $berita->create($input);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        $berita->delete();
        
        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Dihapus');
    }

    public function trash()
    {
        $berita = Berita::onlyTrashed()->paginate();
        return view('admin.berita.trash', compact('berita'));
    }
    
    public function restore($id, TrashService $trashService)
    {
        $berita = Berita::withTrashed()->findOrFail($id);
        $root = '-berita';
        return $trashService->restore($berita, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $berita = Berita::withTrashed()->findOrFail($id);
        $root = '-berita';
        return $trashService->delete($berita, $root);
    }

    public function deleteAllPermanent(TrashService $trashService)
    {
        $berita = Berita::withTrashed();
        $root = '-berita';
        return $trashService->delete($berita, $root);
    }
}