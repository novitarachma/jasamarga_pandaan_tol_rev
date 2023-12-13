<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Services\FileUploadService;
use App\Http\Requests\StoreBeritaRequest;
use App\Services\TrashService;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
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
        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $fileUploadService->uploadImage($foto);
        } else{
            $fotoPath = null;
        }
        
        $input = $request->all();
        $input['foto'] = $fotoPath;
        $berita->create($input);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('news.index')->with('success', 'Berita Berhasil Ditambahkan');
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
    public function edit($id)
    {
        $berita = Berita::where('id', $id)->first();
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, StoreBeritaRequest $request, FileUploadService $fileUploadService)
    {
        $berita = Berita::find($id);
        
        if($request->foto && file_exists(storage_path('./app/public/'. $berita->foto))){
            if($berita->foto){
                Storage::disk('public')->delete($berita->foto);
            }
            $foto = $request->file('foto');
            $fotoPath = $fileUploadService->uploadImage($foto);
        }else{
            $fotoPath = $berita->foto;
        }
        
        $input = $request->all();
        $input['foto'] = $fotoPath;
        $berita->update($input);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('news.index')->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::where('id', $id)->first();
        $berita->delete();
        
        return redirect()->route('news.index')->with('success', 'Berita Berhasil Dihapus');
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
        $berita = Berita::onlyTrashed();
        $berita->forceDelete();
        return redirect()->route('trash-berita')->with('status', 'Data all berita permanently deleted!');
    }
}