<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TarifTol;
use App\Models\TarifRecord;
use App\Models\AsalTol;
use App\Models\TujuanTol;
use App\Models\GolonganTol;
use Illuminate\Http\Request;

class TarifTolController extends Controller
{
    public function index()
    {
        $datas = TarifTol::all();
        $tujuan = TujuanTol::all();
        $golongan = GolonganTol::all();
        $record = TarifRecord::all();
        
        $batas = '';
        if($record != null){
            foreach ($record as $rc) {
                    $batas = $rc->tarif->tujuan['name'];
            }
        }
            
        if($batas == null){
            $asal = AsalTol::all();
        }else{
            $asal = AsalTol::where('name', $batas)->first();
        }
        
        $total = 0;

        foreach ($record as $rc) {
            $total += $rc->tarif['harga'];
        }
        
        return view('user.tariftol', compact(
            'datas', 'asal', 'tujuan', 'golongan', 'record', 'total', 'batas'
        ));
    }

    public function tarif(Request $request)
    {
        $request->validate([
            'asal_id' => 'required',
            'tujuan_id' => 'required',
            'golongan_id' => 'required',
        ]);
        
        $asal = $request->get('asal_id');
        $tujuan = $request->get('tujuan_id');
        $golongan = $request->get('golongan_id');
        
        $tarif = TarifTol::where([
            'asal_id' => $asal,
            'tujuan_id' => $tujuan,
            'golongan_id' => $golongan
        ])->first();

        $record = new TarifRecord;
        $record['tarif_id'] = $tarif['id'];
        $record->tarif()->associate($tarif);
        $record->save();
        
        return redirect()->route('tarif');
    }

    public function deleteRecord()
    {
        TarifRecord::truncate();
        
        return redirect()->route('tarif');
    }
}