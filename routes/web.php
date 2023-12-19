<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\User;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers\User'], function () {
    Route::get('tarif', 'TarifTolController@index')->name('tarif');
    Route::get('{id}/detail-berita', 'BeritaController@show')->name('detail-berita');
    Route::get('galeri', 'GaleriController@index')->name('galeri');
    Route::get('berita', 'BeritaController@index')->name('berita');
        Route::get('/perusahaan', 'DokumenController@index')->name('perusahaan');
        Route::get('/karyawan', 'KaryawanController@index')->name('karyawan');
});

Route::get('admin-page', function() {
    return view('admin/index');
})->middleware('role:admin')->name('admin.page');

Route::get('user-page', function() {
    return view('index');
})->middleware('role:user')->name('user.page');

Route::get('/detail', function () {
    return view('user/detail-berita');
});

Route::get('/SetProfile', function () {

Route::get('/profile', function () {

    return view('user/user-profile');
});

Route::get('/profile', function () {
    return view('user/Profile-page');
});

Route::get('/visimisi', function () {
    return view('profil_perusahaan/visimisi');
});

Route::get('/struktur-organisasi', function () {
    return view('profil_perusahaan/struktur-organisasi');
});

Route::get('/susunan-dewan-komisaris', function () {
    return view('profil_perusahaan/susunan-dewan-komisaris');
});

Route::get('/susunan-direksi', function () {
    return view('profil_perusahaan/susunan-direksi');
});

Route::get('/link', function () {
    return view('profil_perusahaan/link');
});

Route::get('/pustaka', function () {
    return view('profil_perusahaan/pustaka');
});

Route::get('/about', function () {
    return view('user/aboutUs');
});

Route::get('/service', function () {
    return view('user/service');
});

Route::get('/contact', function () {
    return view('user/contact');
});

Route::get('/database', function () {
    return view('monitoring_lereng/database');
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['role:admin']],
function () {
    Route::resource('user', UserController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('tahun', TahunController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('dokumen', DokumenController::class);
    Route::resource('divisi', DivisiController::class);
    Route::resource('kategori', KategoriDocController::class);
    Route::resource('tarif', TarifTolController::class);
    Route::resource('asal', AsalController::class);
    Route::resource('tujuan', TujuanController::class);
    Route::resource('golongan', GolonganController::class);
    Route::controller(UserController::class)->group(function () {
        Route::get('trash-user', 'trash')->name('trash-user');
        Route::post('{id}/restore-user', 'restore')->name('restore-user');
        Route::delete('{id}/delete-permanent-user', 'deletePermanent')->name('delete-permanent-user');
        Route::delete('delete-permanent-all-user', 'deleteAllPermanent')->name('delete-permanent-all-user');
        Route::get('{id}/change-password', 'changePassword')->name('change-password');
        Route::put('{id}/update-password', 'updatePassword')->name('update-password');
    });
    Route::controller(UploadController::class)->group(function () {
        Route::get('upload', 'upload')->name('upload');
        Route::post('file-upload', 'fileUpload')->name('fileUpload');
    });

});

    Route::controller(TarifTolController::class)->group( function () {
        Route::get('trash-tarif', 'trash')->name('trash-tarif');
        Route::post('{id}/restore-tarif', 'restore')->name('restore-tarif');
        Route::delete('{id}/delete-permanent-tarif', 'deletePermanent')->name('delete-permanent-tarif');
        Route::delete('delete-permanent-all-tarif', 'deleteAllPermanent')->name('delete-permanent-all-tarif');
    });
    Route::controller(GaleriController::class)->group( function () {
        Route::get('trash-galeri', 'trash')->name('trash-galeri');
        Route::post('{id}/restore-galeri', 'restore')->name('restore-galeri');
        Route::delete('{id}/delete-permanent-galeri', 'deletePermanent')->name('delete-permanent-galeri');
        Route::delete('delete-permanent-all-galeri', 'deleteAllPermanent')->name('delete-permanent-all-galeri');
    });
    Route::controller(DokumenController::class)->group( function () {
        Route::get('trash-dokumen', 'trash')->name('trash-dokumen');
        Route::post('{id}/restore-dokumen', 'restore')->name('restore-dokumen');
        Route::delete('{id}/delete-permanent-dokumen', 'deletePermanent')->name('delete-permanent-dokumen');
        Route::delete('delete-permanent-all-dokumen', 'deleteAllPermanent')->name('delete-permanent-all-dokumen');
    });
    Route::controller(AsalController::class)->group( function () {
        Route::get('trash-asal', 'trash')->name('trash-asal');
        Route::post('{id}/restore-asal', 'restore')->name('restore-asal');
        Route::delete('{id}/delete-permanent-asal', 'deletePermanent')->name('delete-permanent-asal');
        Route::delete('delete-permanent-all-asal', 'deleteAllPermanent')->name('delete-permanent-all-asal');
    });
    Route::controller(TujuanController::class)->group( function () {
        Route::get('trash-tujuan', 'trash')->name('trash-tujuan');
        Route::post('{id}/restore-tujuan', 'restore')->name('restore-tujuan');
        Route::delete('{id}/delete-permanent-tujuan', 'deletePermanent')->name('delete-permanent-tujuan');
        Route::delete('delete-permanent-all-tujuan', 'deleteAllPermanent')->name('delete-permanent-all-tujuan');
    });
    Route::controller(GolonganController::class)->group( function () {
        Route::get('trash-golongan', 'trash')->name('trash-golongan');
        Route::post('{id}/restore-golongan', 'restore')->name('restore-golongan');
        Route::delete('{id}/delete-permanent-golongan', 'deletePermanent')->name('delete-permanent-golongan');
        Route::delete('delete-permanent-all-golongan', 'deleteAllPermanent')
        ->name('delete-permanent-all-golongan');
    });
    Route::controller(TahunController::class)->group( function () {
        Route::get('trash-tahun', 'trash')->name('trash-tahun');
        Route::post('{id}/restore-tahun', 'restore')->name('restore-tahun');
        Route::delete('{id}/delete-permanent-tahun', 'deletePermanent')->name('delete-permanent-tahun');
        Route::delete('delete-permanent-all-tahun', 'deleteAllPermanent')->name('delete-permanent-all-tahun');
    });
    Route::controller(DivisiController::class)->group( function () {
        Route::get('trash-divisi', 'trash')->name('trash-divisi');
        Route::post('{id}/restore-divisi', 'restore')->name('restore-divisi');
        Route::delete('{id}/delete-permanent-divisi', 'deletePermanent')->name('delete-permanent-divisi');
        Route::delete('delete-permanent-all-divisi', 'deleteAllPermanent')->name('delete-permanent-all-divisi');
    });
    Route::controller(KategoriDocController::class)->group( function () {
        Route::get('trash-kategori', 'trash')->name('trash-kategori');
        Route::post('{id}/restore-kategori', 'restore')->name('restore-kategori');
        Route::delete('{id}/delete-permanent-kategori', 'deletePermanent')->name('delete-permanent-kategori');
        Route::delete('delete-permanent-all-kategori', 'deleteAllPermanent')->name('delete-permanent-all-kategori');
    });
    Route::controller(BeritaController::class)->group( function () {
        Route::get('trash-berita', 'trash')->name('trash-berita');
        Route::post('{id}/restore-berita', 'restore')->name('restore-berita');
        Route::delete('{id}/delete-permanent-berita', 'deletePermanent')->name('delete-permanent-berita');
        Route::delete('delete-permanent-all-berita', 'deleteAllPermanent')->name('delete-permanent-all-berita');
    });
});

