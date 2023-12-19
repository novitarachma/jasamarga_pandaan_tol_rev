<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TarifTol;
use App\Models\AsalTol;
use App\Models\TujuanTol;
use App\Models\GolonganTol;
use Session;
use App\Http\Controllers\Controller;
use App\Services\TrashService;
use App\Http\Requests\StoreTarifTolRequest;
use App\Http\Requests\UpdateTarifTolRequest;
use App\Http\Requests\ImportFileRequest;

class TarifTolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = TarifTol::all();
        $asal = AsalTol::all();
        $tujuan = TujuanTol::all();
        $golongan = GolonganTol::all();
        return view('admin.tarif.index', compact(
            'datas', 'asal', 'tujuan', 'golongan'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asal = AsalTol::all();
        $tujuan = TujuanTol::all();
        $golongan = GolonganTol::all();
        return view('admin.tarif.create', compact(
            'asal', 'tujuan', 'golongan'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
     
    public function store(StoreTarifTolRequest $request, TarifTol $tarif, AsalTol $asal, TujuanTol $tujuan,
    GolonganTol $golongan)
    {
        $input = $request->all();

        $asal['id'] = $input['asal_id'];
        $tujuan['id'] = $input['tujuan_id'];
        $golongan['id'] = $input['golongan_id'];
        
        $tarif->create($input);
        $tarif->asal()->associate($asal);
        $tarif->tujuan()->associate($tujuan);
        $tarif->golongan()->associate($golongan);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tarif.index')->with('success', 'Tarif Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, TarifTol $tarif)
    {
        $tarif->where('id', $id)->first();
        return view('admin.tarif.detail', compact('tarif'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tarif = TarifTol::where('id', $id)->first();
        return view('admin.tarif.edit', compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTarifTolRequest $request, TarifTol $tarif)
    {
        $tarif->update($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tarif.index')->with('success', 'Tarif Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TarifTol $tarif)
    {
        $tarif->delete();
        
        return redirect()->route('tarif.index')->with('success', 'Tarif Berhasil Dihapus');
    }

    public function trash()
    {
        $tarif = TarifTol::onlyTrashed()->paginate();
        $asal = AsalTol::onlyTrashed()->paginate();
        $tujuan = TujuanTol::onlyTrashed()->paginate();
        $golongan = GolonganTol::onlyTrashed()->paginate();
        return view('admin.tarif.trash', compact(
            'tarif', 'asal', 'tujuan', 'golongan'
        ));
    }

    public function restore($id, TrashService $trashService)
    {
        $tarif = TarifTol::withTrashed()->findOrFail($id);
        $root = '-tarif';
        return $trashService->restore($tarif, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $tarif = TarifTol::withTrashed()->findOrFail($id);
        $root = '-tarif';
        return $trashService->delete($tarif, $root);
    }

    public function deleteAllPermanent(TrashService $trashService)
    {
        $tarif = TarifTol::onlyTrashed();
        $tarif->forceDelete();
        return redirect()->route('trash-tarif')->with('status', 'Data all tarif permanently deleted!');
    }
}