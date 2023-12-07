<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Tahun;
use App\Services\FileUploadService;
use App\Http\Requests\StoreGaleriRequest;
use App\Services\TrashService;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Galeri::all();
        $tahun = Tahun::all();
        return view('admin.galeri.index', compact(
            'datas', 'tahun'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahun = Tahun::all();
        return view('admin.galeri.create', compact(
            'tahun'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
     
    public function store(Galeri $galeri, Tahun $tahun, StoreGaleriRequest $request,
    FileUploadService $fileUploadService)
    {
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $fileUploadService->uploadImage($foto);
        } else{
            $fotoPath = null;
        }
        
        $input = $request->all();
        
        $galeri['judul'] = $input['judul'];
        $galeri['foto'] = $fotoPath;
        $galeri->save();
        
        $tahun['id'] = $input['tahun'];
        $galeri->tahun()->associate($tahun);
        $galeri->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Galeri $galeri)
    {
        $galeri->where('id', $id)->first();
        return view('admin.galeri.detail', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Galeri $galeri)
    {
        $galeri->where('id', $id)->first();
        return view('admin.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Galeri $galeri, Tahun $tahun, StoreGaleriRequest $request,
    FileUploadService $fileUploadService)
    {
        if($galeri->foto && file_exists(storage_path('./app/public/'. $galeri->foto))){
            Storage::delete(['public/', $galeri->foto]);
        }
        
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $fileUploadService->uploadImage($foto);
        } else{
            $fotoPath = null;
        }
        
        $input = $request->all();
        
        $galeri['judul'] = $input['judul'];
        $galeri['foto'] = $fotoPath;
        $galeri->save();
        
        $tahun['id'] = $input['tahun'];
        $galeri->tahun()->associate($tahun);
        $galeri->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        
        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasil Dihapus');
    }

    public function trash()
    {
        $galeri = Galeri::onlyTrashed()->paginate();
        $tahun = Tahun::onlyTrashed()->paginate();
        return view('admin.galeri.trash', compact('galeri', 'tahun'));
    }
    
    public function restore($id, TrashService $trashService)
    {
        $galeri = Galeri::withTrashed()->findOrFail($id);
        $root = '-galeri';
        return $trashService->restore($galeri, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $galeri = Galeri::withTrashed()->findOrFail($id);
        $root = '-galeri';
        return $trashService->delete($galeri, $root);
    }

    public function deleteAllPermanent(TrashService $trashService)
    {
        $galeri = Galeri::withTrashed();
        $root = '-galeri';
        return $trashService->delete($galeri, $root);
    }
}