<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TujuanTol;
use Session;
use App\Services\TrashService;
use App\Http\Requests\StoreDataRequest;

class TujuanController extends Controller
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
        return view('admin.tarif.tujuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TujuanTol $tujuan, StoreDataRequest $request)
    {
        $tujuan->create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect(route('tarif.index'))->with('success', 'Tujuan Gerbang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, TujuanTol $tujuan)
    {
        $tujuan->where('id', $id)->first();
        return view('admin.tarif.tujuan.detail', compact('tujuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, TujuanTol $tujuan)
    {
        $tujuan->find($id);
        return view('admin.tarif.tujuan.edit', compact('tujuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDataRequest $request, TujuanTol $tujuan)
    {
        $tujuan->update($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tarif.index')->with('success', 'Tujuan Gerbang Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TujuanTol $tujuan)
    {
        $tujuan->delete();

        return redirect()->route('tarif.index')->with('success', 'Tujuan Gerbang Berhasil Dihapus');
    }

    public function restore($id, TrashService $trashService)
    {
        $tujuan = TujuanTol::withTrashed()->findOrFail($id);
        $root = '-tarif';
        return $trashService->restore($tujuan, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $tujuan = TujuanTol::withTrashed()->findOrFail($id);
        $root = '-tarif';
        return $trashService->delete($tujuan, $root);
    }

    public function deleteAllPermanent(TrashService $trashService)
    {
        $tujuan = TujuanTol::onlyTrashed();
        $tujuan->forceDelete();
        return redirect()->route('trash-tarif')->with('status', 'Data all tujuan permanently deleted!');
    }

}