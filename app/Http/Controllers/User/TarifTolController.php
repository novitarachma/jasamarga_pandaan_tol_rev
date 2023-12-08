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
}