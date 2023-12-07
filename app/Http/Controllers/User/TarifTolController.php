<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarifTolController extends Controller
{
    public function index()
    {
        return view('user.tariftol');
    }
}
