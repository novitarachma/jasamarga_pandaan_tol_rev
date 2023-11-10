<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Services\FileUploadService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\ImportFileRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::with(['roles'])->get();
        $model = new User;
        return view('admin.users.index', compact(
            'datas', 'model'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
     
    public function store(StoreUserRequest $request, FileUploadService $fileUploadService)
    {
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $fileUploadService->uploadImage($photo);
        } else{
            $photoPath = null;
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
        
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect(route('user.index'))->with('success', 'User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User Berhasil Dihapus');
    }

    public function massDestroy(Request $request)
    {
        User::whereIn('id', $request->get('selected'))->delete();

        return response("Selected post(s) deleted successfully.", 200);
    }

    public function trash()
    {
        $user = User::onlyTrashed()->paginate(10);
        return view('admin.users.trash', ['user' => $user]);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        if($user->trashed()){
            
            $user->restore();
            
            return redirect()->route('trash')->with('status', 'Data successfully restored');
        
        } else {
        
            return redirect()->route('trash')->with('status', 'Data is not in trash');
        }
       
    }
    
    public function deletePermanent($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        if(!$user->trashed())
        {
            return redirect()->route('trash')->with('status', 'Data is noting trash!');
        } else {
            $user->forceDelete();
            return redirect()->route('trash')->with('status', 'Data permanently deleted!');
        }
    }

    // Import file excel
    public function import_user(ImportFileRequest $request, FileUploadService $fileUploadService)
	{
		if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $fileUploadService->uploadFile($file);
        }
        
		// import data
		Excel::import(new UserImport, storage_path('./app/public/'.$filePath));
 
		// notifikasi dengan session
		Session::flash('sukses','Data User Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect()->route('admin.users.index');
	}

}