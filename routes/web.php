<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\unitUtamaController;
use App\Models\unitUtama;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|   -

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'index'])->name(name: 'login')->middleware(('guest')) ;
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');


Route::get('/register',[RegisterController::class, 'index'] )->middleware(('guest'));
Route::post('/register',[RegisterController::class, 'store'] );

// Route untuk menampilkan halaman organisasi
Route::get('/organisasi', [unitUtamaController::class, 'index'])->name('organisasi.index')->middleware('auth');

// Route untuk meng-handle store visi dan misi
Route::post('/organisasi/store-visi-misi', [unitUtamaController::class, 'storeVisiMisi'])->name('organisasi.storeVisiMisi')->middleware('auth');

// Route untuk meng-handle update visi dan misi
Route::put('/organisasi/update-visi-misi/{id}', [unitUtamaController::class, 'updateVisiMisi'])->name('organisasi.updateVisiMisi')->middleware('auth');

// Route untuk meng-handle store tujuan
Route::post('/organisasi/store-tujuan', [unitUtamaController::class, 'storeTujuan'])->name('organisasi.storeTujuan')->middleware('auth');
Route::post('/organisasi/store-tujuanit', [unitUtamaController::class, 'storeTujuanIt'])->name('organisasi.storeTujuanIt')->middleware('auth');

// Route untuk meng-handle update tujuan
Route::put('/organisasi/update-tujuan/{id}', [unitUtamaController::class, 'updateTujuan'])->name('organisasi.updateTujuan')->middleware('auth');
Route::delete('/organisasi/delete-visi-misi/{id}', action: [unitUtamaController::class, 'destroy'])->name('organisasi.destroyVisiMisi')->middleware('auth');
Route::delete('/organisasi/delete-tujuan-organisasi/{id}', action: [unitUtamaController::class, 'destroys'])->name('organisasi.destroystujuan')->middleware('auth');



Route::get('/unit', function () {
    return view('unit');
})->middleware('auth');

Route::get('/roadmap', function () {
    return view('roadmap');
})->middleware('auth');

Route::get('/histori', function () {
    return view('histori');
})->middleware('auth');
