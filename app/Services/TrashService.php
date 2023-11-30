<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TrashService
{
    public function restore($user)
    {
        if($user->trashed()){
            
            $user->restore();
            
            return redirect()->route('trash')->with('status', 'Data successfully restored');
        
        } else {
        
            return redirect()->route('trash')->with('status', 'Data is not in trash');
        }
       
    }
    
    public function delete($user)
    {
        if(!$user->trashed())
        {
            return redirect()->route('trash')->with('status', 'Data is noting trash!');
        } else {
            $user->forceDelete();
            return redirect()->route('trash')->with('status', 'Data permanently deleted!');
        }
    }
}