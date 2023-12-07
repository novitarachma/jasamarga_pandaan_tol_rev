<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');

        $user->load('roles');
        
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, FileUploadService $fileUploadService, User $user)
    {
        
        if($user->photo && file_exists(storage_path('./app/public/image'. $user->photo))){
            Storage::delete(['public/image/', $user->photo]);
        }
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $fileUploadService->uploadImage($photo);
        } else{
            $photoPath = null;
        }
        
        if($user->photo_cover && file_exists(storage_path('./app/public/'. $user->photo_cover))){
            Storage::delete(['public/', $user->photo_cover]);
        }

        if ($request->hasFile('photo_cover')) {
            $photoCover = $request->file('photo_cover');
            $photoCoverPath = $fileUploadService->uploadImage($photoCover);
        } else{
            $photoCoverPath = null;
        }
        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['photo'] = $photoPath;
        $input['photo_cover'] = $photoCoverPath;
        
        $user->update($input);
        $user->assignRole($request->input('roles'));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('user.index')->with('success', 'User Berhasil Ditambahkan');
    }
}