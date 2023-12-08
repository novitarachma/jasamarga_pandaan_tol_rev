<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsalTol;
use Session;
use App\Services\TrashService;
use App\Http\Requests\StoreDataRequest;

class AsalController extends Controller
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
        return view('admin.tarif.asal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AsalTol $asal, StoreDataRequest $request)
    {
        $asal->create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect(route('tarif.index'))->with('success', 'Asal Gerbang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, AsalTol $asal)
    {
        $asal->where('id', $id)->first();
        return view('admin.tarif.asal.detail', compact('asal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, AsalTol $asal)
    {
        $asal->find($id);
        return view('admin.tarif.asal.edit', compact('asal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDataRequest $request, AsalTol $asal)
    {
        $asal->update($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tarif.index')->with('success', 'Asal Gerbang Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsalTol $asal)
    {
        $asal->delete();

        return redirect()->route('tarif.index')->with('success', 'Asal Gerbang Berhasil Dihapus');
    }

    public function restore($id, TrashService $trashService)
    {
        $asal = AsalTol::withTrashed()->findOrFail($id);
        $root = '-tarif';
        return $trashService->restore($asal, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $asal = AsalTol::withTrashed()->findOrFail($id);
        $root = '-tarif';
        return $trashService->delete($asal, $root);
    }

    public function deleteAllPermanent(TrashService $trashService)
    {
        $asal = AsalTol::withTrashed();
        $root = '-tarif';
        return $trashService->delete($asal, $root);
    }

}