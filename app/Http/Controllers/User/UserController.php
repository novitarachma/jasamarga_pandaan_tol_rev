<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Gaji;
use App\Models\UserDetail;

class UserController extends Controller
{
    public function index()
    {
        $user = User::whereId(auth()->user()->id);
        $detail = UserDetail::where('user_id', auth()->user()->id);
        return view('user.profil.index', compact('user', 'detail'));
    }
    
    public function editAccount()
    {
        $user = User::whereId(auth()->user()->id);
        return view('user.profil.account', compact('user'));
    }
    
    public function updateAccount(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('profil.index')->with('success', 'User Berhasil Ditambahkan');
    }
    
    public function editProfile()
    {
        $user = UserDetail::where('user_id', auth()->user()->id)->first();
        return view('user.profil.setProfile', compact('user'));
    }
    
    public function updateProfile(StoreProfileRequest $request, FileUploadService $fileUploadService, User $user)
    {
        if($request->photo && file_exists(storage_path('./app/public/'. $user->photo))){
            if($user->photo){
                Storage::disk('public')->delete($user->photo);
            }
            $photo = $request->file('photo');
            $photoPath = $fileUploadService->uploadImage($photo);
        }else{
            $photoPath = $user->photo;
        }

        if($request->photo_cover && file_exists(storage_path('./app/public/'. $user->photo_cover))){
            if($user->photo_cover){
                Storage::disk('public')->delete($user->photo_cover);
            }
            $photo_cover = $request->file('photo_cover');
            $photoCoverPath = $fileUploadService->uploadImage($photo_cover);
        }else{
            $photoCoverPath = $user->photo_cover;
        }
        
        $input = $request->all();
        $input['photo'] = $photoPath;
        $input['photo_cover'] = $photoCoverPath;
        
        $user->update($input);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('profil.index')->with('success', 'User Berhasil Ditambahkan');
    }
    
    public function changePassword()
    {
        return view('user.profil.change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function gaji()
    {
        $gaji = Gaji::where('user_id', auth()->user()->id)->get();
        $user = User::whereId(auth()->user()->id);
        return view('user.profil.gaji', compact('gaji', 'user'));
    }

    public function cetakGaji(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'bulan' => 'required',
        ]);
        
        $gaji = Gaji::where(
            ['user_id', auth()->user()->id],
            ['tahun_id', $request->tahun],
            ['bulan_id', $request->bulan],
        )->get();

        return $gaji->link;
    }
}