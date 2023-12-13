<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use App\Http\Requests\ImportFileRequest;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;
use App\Imports\TarifTolImport;
use App\Imports\GajiImport;
use App\Models\Tahun;
use App\Models\Bulan;

class UploadController extends Controller
{
    public  function upload()
    {
        $label = [
			'User',
			'Tarif Tol',
			'Gaji',
	    ];
        
        $tahun = Tahun::all();
        $bulan = Bulan::all();
        
        return view('admin.fileUpload', compact(
            'label', 'tahun', 'bulan'
        ));
    }
    
    public function fileUpload(ImportFileRequest $request, FileUploadService $fileUploadService)
	{
		if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $fileUploadService->uploadFile($file);
        }
        
        $label = $request->get('label');
        $tahun = $request->get('tahun');
        $bulan = $request->get('bulan');
        
        // import data
        if($label == 'User'){
            Excel::import(new UserImport, storage_path('./app/public/'.$filePath));
        }elseif($label == 'Gaji'){
            Excel::import(new GajiImport($tahun, $bulan), storage_path('./app/public/'.$filePath));
        }elseif($label == 'Tarif Tol'){
            Excel::import(new TarifTolImport, storage_path('./app/public/'.$filePath));
        }
		
		// notifikasi dengan session
		Session::flash('sukses','Data User Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect()->route('upload')->with('success', 'Data '. $label .' Berhasil Ditambahkan');;
	}
}