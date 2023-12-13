<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Tahun;
use App\Models\Bulan;
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
        $bulan = Bulan::all();
        return view('admin.galeri.index', compact(
            'datas', 'tahun', 'bulan'
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
     
    public function store(Galeri $galeri, StoreGaleriRequest $request, FileUploadService $fileUploadService)
    {
        if($request->file('foto')){
            $foto = $request->file('foto');
            $fotoPath = $fileUploadService->uploadImage($foto);
        }else{
            $fotoPath = null;
        }
        
        $input = $request->all();
        $input['foto'] = $fotoPath;
        
        $tahun = new Tahun;
        $tahun['id'] = $input['tahun_id'];
        
        $galeri->create($input);
        $galeri->tahun()->associate($tahun);
        

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Galeri $galeri)
    {
        $galeri->where('id', $id)->first();
        return view('admin.galeri.detail', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $galeri = Galeri::where('id', $id)->first();
        $tahun = Tahun::all();
        return view('admin.galeri.edit', compact('galeri', 'tahun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Galeri $galeri, StoreGaleriRequest $request, FileUploadService $fileUploadService)
    {
        if($request->foto && file_exists(storage_path('./app/public/'. $galeri->foto))){
            if($galeri->foto){
                Storage::disk('public')->delete($galeri->foto);
            }
            $foto = $request->file('foto');
            $fotoPath = $fileUploadService->uploadImage($foto);
        }else{
            $fotoPath = $galeri->foto;
        }
        
        $input = $request->all();
        $input['foto'] = $fotoPath;
        
        $tahun = new Tahun;
        $tahun['id'] = $input['tahun_id'];
        
        $galeri->update($input);
        $galeri->tahun()->associate($tahun);
        

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasil Dirubah');
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
        $bulan = Bulan::onlyTrashed()->paginate();
        return view('admin.galeri.trash', compact('galeri', 'tahun', 'bulan'));
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
        $galeri = Galeri::onlyTrashed();
        $galeri->forceDelete();
        return redirect()->route('trash-galeri')->with('status', 'Data all galeri permanently deleted!');
    }
}