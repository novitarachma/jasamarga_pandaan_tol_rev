<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bulan;
use Session;
use App\Services\TrashService;
use App\Http\Requests\StoreDataRequest;

class BulanController extends Controller
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
        return view('admin.galeri.bulan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Bulan $bulan, StoreDataRequest $request)
    {
        $bulan->create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect(route('settings'))->with('success', 'Bulan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Bulan $bulan)
    {
        $bulan->where('id', $id)->first();
        return view('admin.galeri.bulan.detail', compact('bulan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Bulan $bulan)
    {
        $bulan->find($id);
        return view('admin.galeri.bulan.edit', compact('bulan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDataRequest $request, Bulan $bulan)
    {
        $bulan->update($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('settings')->with('success', 'Bulan Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bulan $bulan)
    {
        $bulan->delete();

        return redirect()->route('settings')->with('success', 'Bulan Berhasil Dihapus');
    }

    public function restore($id, TrashService $trashService)
    {
        $bulan = Bulan::withTrashed()->findOrFail($id);
        $root = '-galeri';
        return $trashService->restore($bulan, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $bulan = Bulan::withTrashed()->findOrFail($id);
        $root = '-galeri';
        return $trashService->delete($bulan, $root);
    }

    public function deleteAllPermanent(TrashService $trashService)
    {
        $bulan = Bulan::onlyTrashed();
        $bulan->forceDelete();
        return redirect()->route('trash-galeri')->with('status', 'Data permanently deleted!');
    }

}