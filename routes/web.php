<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/berita', function () {
    return view('user/berita');
});

Route::get('admin-page', function() {
    return view('admin/index');
})->middleware('role:admin')->name('admin.page');

Route::get('user-page', function() {
    return view('index');
})->middleware('role:user')->name('user.page');

Route::get('/galeri', function () {
    return view('user/galeri');
});
 
Route::get('/detail', function () {
    return view('user/detail-berita');
});

Route::get('/profile', function () {
    return view('user/user-profile');
});

Route::get('/visimisi', function () {
    return view('profil_perusahaan/visimisi');
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['role:admin']],
function () {
    Route::resource('user', UserController::class);
    Route::resource('tarif', TarifTolController::class);
    Route::resource('galeri', GaleriController::class);
    Route::controller(UserController::class)->group(function () {
        Route::get('trash-user', 'trash')->name('trash-user');
        Route::post('{id}/restore', 'restore')->name('restore-user');
        Route::delete('{id}/delete-permanent', 'deletePermanent')->name('deletePermanentUser');
        Route::get('{id}/change-password', 'changePassword')->name('change-password');
        Route::put('{id}/update-password', 'updatePassword')->name('update-password');
    });
    Route::controller(UploadController::class)->group(function () {
        Route::get('upload', 'upload')->name('upload');
        Route::post('file-upload', 'fileUpload')->name('fileUpload');
    });
    Route::controller(TarifTolController::class)->group( function () {
        Route::get('trash-tarif', 'trash')->name('trash-tarif');
        Route::post('{id}/restore', 'restore')->name('restore-tarif');
        Route::delete('{id}/delete-permanent', 'deletePermanent')->name('deletePermanentTarif');
    });
});