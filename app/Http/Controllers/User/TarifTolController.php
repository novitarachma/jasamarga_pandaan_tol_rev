<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TarifTol;
use Illuminate\Http\Request;

class TarifTolController extends Controller
{
    public function index()
    {
        $datas = TarifTol::all();
        return view('user.tariftol', compact(
            'datas'
        ));
    }

    public function tarif(Request $request){
        $input = $request->all();
        
        $tarif = TarifTol::where(
            ['asal_id', $input['asal']],
            ['tujuan_id', $input['tujuan']],
            ['golongan_id', $input['golongan']],
        )->get();

        return view('user.tariftol', compact(
            'tarif'
        ));
    }
}