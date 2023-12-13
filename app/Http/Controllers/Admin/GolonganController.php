<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GolonganTol;
use Session;
use App\Services\TrashService;
use App\Http\Requests\StoreDataRequest;

class GolonganController extends Controller
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
        return view('admin.tarif.golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GolonganTol $golongan, StoreDataRequest $request)
    {
        $golongan->create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect(route('tarif.index'))->with('success', 'Golongan Kendaraan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, GolonganTol $golongan)
    {
        $golongan->where('id', $id)->first();
        return view('admin.tarif.golongan.detail', compact('golongan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, GolonganTol $golongan)
    {
        $golongan->find($id);
        return view('admin.tarif.golongan.edit', compact('golongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDataRequest $request, GolonganTol $golongan)
    {
        $golongan->update($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tarif.index')->with('success', 'Golongan Kendaraan Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GolonganTol $golongan)
    {
        $golongan->delete();

        return redirect()->route('tarif.index')->with('success', 'Golongan Kendaraan Berhasil Dihapus');
    }

    public function restore($id, TrashService $trashService)
    {
        $golongan = GolonganTol::withTrashed()->findOrFail($id);
        $root = '-tarif';
        return $trashService->restore($golongan, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $golongan = GolonganTol::withTrashed()->findOrFail($id);
        $root = '-tarif';
        return $trashService->delete($golongan, $root);
    }

    public function deleteAllPermanent()
    {
        $golongan = GolonganTol::onlyTrashed();
        $golongan->forceDelete();
        return redirect()->route('trash-tarif')->with('status', 'Data all golongan permanently deleted!');
    }

}