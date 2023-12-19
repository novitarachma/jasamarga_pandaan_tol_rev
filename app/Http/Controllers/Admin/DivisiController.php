<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Divisi;
use Session;
use App\Services\TrashService;
use App\Http\Requests\StoreDataRequest;

class DivisiController extends Controller
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
        return view('admin.dokumen.divisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Divisi $divisi, StoreDataRequest $request)
    {
        $divisi->create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect(route('dokument.index'))->with('success', 'Divisi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Divisi $divisi)
    {
        $divisi->where('id', $id)->first();
        return view('admin.dokumen.divisi.detail', compact('divisi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Divisi $divisi)
    {
        $divisi->find($id);
        return view('admin.dokumen.divisi.edit', compact('divisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDataRequest $request, Divisi $divisi)
    {
        $divisi->update($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('dokument.index')->with('success', 'Divisi Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();

        return redirect()->route('dokument.index')->with('success', 'Divisi Berhasil Dihapus');
    }

    public function restore($id, TrashService $trashService)
    {
        $divisi = Divisi::withTrashed()->findOrFail($id);
        $root = '-dokumen';
        return $trashService->restore($divisi, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $divisi = Divisi::withTrashed()->findOrFail($id);
        $root = '-dokumen';
        return $trashService->delete($divisi, $root);
    }

    public function deleteAllPermanent(TrashService $trashService)
    {
        $divisi = Divisi::onlyTrashed();
        $divisi->forceDelete();
        return redirect()->route('trash-dokumen')->with('status', 'Data all divisi permanently deleted!');
    }

}