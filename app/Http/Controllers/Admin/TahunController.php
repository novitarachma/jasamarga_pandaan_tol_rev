<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahun;
use Session;
use App\Services\TrashService;
use App\Http\Requests\StoreDataRequest;

class TahunController extends Controller
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
        return view('admin.galeri.tahun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Tahun $tahun, StoreDataRequest $request)
    {
        $tahun->create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect(route('settings'))->with('success', 'Tahun Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Tahun $tahun)
    {
        $tahun->where('id', $id)->first();
        return view('admin.galeri.tahun.detail', compact('tahun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Tahun $tahun)
    {
        $tahun->find($id);
        return view('admin.galeri.tahun.edit', compact('tahun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDataRequest $request, Tahun $tahun)
    {
        $tahun->update($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('settings')->with('success', 'Tahun Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tahun $tahun)
    {
        $tahun->delete();

        return redirect()->route('settings')->with('success', 'Tahun Berhasil Dihapus');
    }

    public function restore($id, TrashService $trashService)
    {
        $tahun = Tahun::withTrashed()->findOrFail($id);
        $root = '-galeri';
        return $trashService->restore($tahun, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $tahun = Tahun::withTrashed()->findOrFail($id);
        $root = '-galeri';
        return $trashService->delete($tahun, $root);
    }

    public function deleteAllPermanent(TrashService $trashService)
    {
        $tahun = Tahun::onlyTrashed();
        $tahun->forceDelete();
        return redirect()->route('trash-galeri')->with('status', 'Data permanently deleted!');
    }

}