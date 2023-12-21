<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Gaji;
use App\Models\Bulan;
use App\Models\Tahun;
use App\Models\Karyawan;
use App\Models\UserDetail;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreProfileRequest;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Storage;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::whereId(auth()->user()->id)->first();
        $detail = UserDetail::where('user_id', auth()->user()->id)->first();
        $karyawan = Karyawan::where('user_id', auth()->user()->id)->first();
        return view('user.profil.Profile-page', compact('user', 'detail', 'karyawan'));
    }
    
    public function editAccount()
    {
        $user = User::whereId(auth()->user()->id)->first();
        return view('user.profil.user-profile', compact('user'));
    }
    
    public function updateAccount(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'. auth()->user()->id,
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('profil')->with('success', 'User Berhasil Ditambahkan');
    }
    
    public function editProfile()
    {
        $user = UserDetail::where('user_id', auth()->user()->id)->first();
        return view('user.profil.upload', compact('user'));
    }
    
    public function updateProfile(StoreProfileRequest $request, FileUploadService $fileUploadService)
    {
        $detail = UserDetail::where('user_id', auth()->user()->id)->first();

        if($request->foto && file_exists(storage_path('./app/public/'. $detail->foto))){
            if($detail->foto){
                Storage::disk('public')->delete($detail->foto);
            }
            $foto = $request->file('foto');
            $photoPath = $fileUploadService->uploadImage($foto);
        }else{
            $photoPath = $detail->foto;
        }

        if($request->foto_cover && file_exists(storage_path('./app/public/'. $detail->foto_cover))){
            if($detail->foto_cover){
                Storage::disk('public')->delete($detail->foto_cover);
            }
            $foto_cover = $request->file('foto_cover');
            $photoCoverPath = $fileUploadService->uploadImage($foto_cover);
        }else{
            $photoCoverPath = $detail->foto_cover;
        }
        
        $input = $request->all();

        $detail->description = $input['description'];
        $detail->foto = $photoPath;
        $detail->foto_cover = $photoCoverPath;
        $detail->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('profil')->with('success', 'User Berhasil Ditambahkan');
    }
    
    public function changePassword()
    {
        return view('user.profil.password');
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

        return redirect()->route('profil')->with('success', 'Password Succesfully');
    }

    public function gaji()
    {
        $gaji = Gaji::where('user_id', auth()->user()->id)->get();
        $user = User::whereId(auth()->user()->id);
        $bulan = Bulan::all();
        $tahun = Tahun::all();
        return view('user.profil.slipgaji', compact('gaji', 'user', 'bulan', 'tahun'));
    }

    public function cetakGaji(Request $request)
    {
        $request->validate([
            'tahun_id' => 'required',
            'bulan_id' => 'required',
        ]);
        
        $tahun = $request->get('tahun_id');
        $bulan = $request->get('bulan_id');
        $user = auth()->user()->id;
        
        $gaji = Gaji::where([
            'user_id' => $user,
            'tahun_id' => $tahun,
            'bulan_id' => $bulan
        ])->first();

        $url = $gaji->link;
        
        return redirect()->away($url);
    }
}