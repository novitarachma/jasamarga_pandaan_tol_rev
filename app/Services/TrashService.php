<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TrashService
{
    public function restore($data, $root)
    {
        if($data->trashed()){
            
            $data->restore();
            
            return redirect()->route('trash'.$root)->with('status', 'Data successfully restored');
        
        } else {

            return redirect()->route('trash'.$root)->with('error', 'Data is not in trash');
        }
       
    }
    
    public function delete($data, $root)
    {
        if(!$data->trashed())
        {
            return redirect()->route('trash'.$root)->with('error', 'Data is noting trash!');
        } else {
            $data->forceDelete();
            return redirect()->route('trash'.$root)->with('status', 'Data permanently deleted!');
        }
    }
}