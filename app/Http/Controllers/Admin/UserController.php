<?php

namespace App\Http\Controllers\Admin;

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
use App\Services\TrashService;
use App\Services\ChangePasswordService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ImportFileRequest;
use App\Http\Requests\ChangePasswordRequest;
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
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        
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
    public function update(UpdateUserRequest $request, User $user)
    {
        
        $user->update($request->all());
        $user->syncRoles($request->input('roles'));

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
        $user = User::onlyTrashed()->paginate();
        return view('admin.users.trash', ['user' => $user]);
    }

    public function restore($id, TrashService $trashService)
    {
        $user = User::withTrashed()->findOrFail($id);
        return $trashService->restore($user);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $user = User::withTrashed()->findOrFail($id);
        return $trashService->delete($user);
    }

    public function changePassword($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.change-password', compact('user'));
    }

    public function updatePassword(ChangePasswordRequest $request, $id)
    {
        $input = $request->all();
        
        $user = User::where('id', $id);
        #Update the new Password
        $user->update([
            'password' => Hash::make($input['new_password'])
        ]);

        return redirect()->route('user.index')->with("status", "Password changed successfully!");
    }
}