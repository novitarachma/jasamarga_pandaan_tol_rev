<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\KategoriDokumen;
use App\Services\FileUploadService;
use App\Http\Requests\StoreDokumenRequest;
use App\Services\TrashService;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Dokumen::all();
        $kategori = KategoriDokumen::all();
        return view('admin.dokumen.index', compact(
            'datas', 'kategori'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisi = Divisi::all();
        $kategori = KategoriDokumen::all();
        return view('admin.dokumen.create', compact(
            'divisi', 'kategori'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
     
    public function store(Dokumen $dokumen, Divisi $divisi, KategoriDokumen $kategori, StoreDokumenRequest $request,
    FileUploadService $fileUploadService)
    {
        if ($request->file('file')) {
            $file = $request->file('file');
            $filePath = $fileUploadService->uploadFile($file);
        } else{
            $filePath = null;
        }
        
        $input = $request->all();
        $input['file'] = $filePath;
        
        $divisi['id'] = $input['divisi_id'];
        $kategori['id'] = $input['kategori_id'];
        
        $dokumen->create($input);
        $dokumen->divisi()->associate($divisi);
        $dokumen->kategori()->associate($kategori);
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('dokument.index')->with('success', 'Dokumen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Dokumen $dokumen)
    {
        $dokumen->where('id', $id)->first();
        return view('admin.dokumen.detail', compact('dokumen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokumen = Dokumen::where('id', $id)->first();
        $divisi = Divisi::all();
        $kategori = KategoriDokumen::all();
        return view('admin.dokumen.edit', compact('dokumen', 'divisi', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Divisi $divisi, KategoriDokumen $kategori, StoreDokumenRequest $request,
    FileUploadService $fileUploadService)
    {
        $dokumen = Dokumen::find($id);
        
        if($request->file && file_exists(storage_path('./app/public/'. $dokumen->file))){
            if($dokumen->file){
                Storage::disk('public')->delete($dokumen->file);
            }
            $file = $request->file('file');
            $filePath = $fileUploadService->uploadFile($file);
        }else{
            $filePath = $dokumen->file;
        }
        
        $input = $request->all();
        $input['file'] = $filePath;
        
        $divisi['id'] = $input['divisi_id'];
        $kategori['id'] = $input['kategori_id'];
        
        $dokumen->update($input);
        $dokumen->divisi()->associate($divisi);
        $dokumen->kategori()->associate($kategori);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('dokument.index')->with('success', 'Dokumen Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen)
    {
        $dokumen->delete();
        
        return redirect()->route('dokument.index')->with('success', 'Dokumen Berhasil Dihapus');
    }

    public function trash()
    {
        $dokumen = Dokumen::onlyTrashed()->paginate();
        $divisi = Divisi::onlyTrashed()->paginate();
        $kategori = KategoriDokumen::onlyTrashed()->paginate();
        return view('admin.dokumen.trash', compact('dokumen', 'divisi', 'kategori'));
    }

    public function restore($id, TrashService $trashService)
    {
        $dokumen = Dokumen::withTrashed()->findOrFail($id);
        $root = '-dokumen';
        return $trashService->restore($dokumen, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $dokumen = Dokumen::withTrashed()->findOrFail($id);
        $root = '-dokumen';
        return $trashService->delete($dokumen, $root);
    }

    public function deleteAllPermanent(TrashService $trashService)
    {
        $dokumen = Dokumen::onlyTrashed();
        $dokumen->forceDelete();
        return redirect()->route('trash-dokumen')->with('status', 'Data all dokumen permanently deleted!');
    }
}