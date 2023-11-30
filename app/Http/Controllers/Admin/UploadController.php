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

class UploadController extends Controller
{
    public  function upload()
    {
        $labelList = [
			'User',
			'Tarif Tol',
			'Gaji',
	    ];
        
        return view('admin.fileUpload', ['label' => $labelList]);
    }

    const FOLDER = './app/public/';
    
    public function fileUpload(ImportFileRequest $request, FileUploadService $fileUploadService)
	{
		if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $fileUploadService->uploadFile($file);
        }
        
        $label = $request->get('label');
        
        // import data
        if($label == 'User'){
            Excel::import(new UserImport, storage_path(FOLDER.$filePath));
        }elseif($label == 'Gaji'){
            Excel::import(new GajiImport, storage_path(FOLDER.$filePath));
        }elseif($label == 'Tarif Tol'){
            Excel::import(new TarifTolImport, storage_path(FOLDER.$filePath));
        }
		
		// notifikasi dengan session
		Session::flash('sukses','Data User Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect()->route('fileUpload');
	}
}