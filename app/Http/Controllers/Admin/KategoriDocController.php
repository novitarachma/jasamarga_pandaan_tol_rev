<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriDokumen;
use Session;
use App\Services\TrashService;
use App\Http\Requests\StoreDataRequest;

class KategoriDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dokumen.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriDokumen $kategori, StoreDataRequest $request)
    {
        $kategori->create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect(route('dokument.index'))->with('success', 'Kategori Dokumen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, KategoriDokumen $kategori)
    {
        $kategori->where('id', $id)->first();
        return view('admin.dokumen.kategori.detail', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, KategoriDokumen $kategori)
    {
        $kategori->find($id);
        return view('admin.dokumen.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDataRequest $request, KategoriDokumen $kategori)
    {
        $kategori->update($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('dokument.index')->with('success', 'Kategori Dokumen Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriDokumen $kategori)
    {
        $kategori->delete();

        return redirect()->route('dokument.index')->with('success', 'Kategori Dokumen Berhasil Dihapus');
    }

    public function restore($id, TrashService $trashService)
    {
        $kategori = KategoriDokumen::withTrashed()->findOrFail($id);
        $root = '-dokumen';
        return $trashService->restore($kategori, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $kategori = KategoriDokumen::withTrashed()->findOrFail($id);
        $root = '-dokumen';
        return $trashService->delete($kategori, $root);
    }

    public function deleteAllPermanent(TrashService $trashService)
    {
        $kategori = KategoriDokumen::onlyTrashed();
        $kategori->forceDelete();
        return redirect()->route('trash-dokumen')->with('status', 'Data all kategori permanently deleted!');
    }

}