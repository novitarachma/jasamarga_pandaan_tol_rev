<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/berita', function () {
    return view('user/berita');
});

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
