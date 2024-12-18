<?php

use App\Exports\RoadmapExport;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\unitKerjaController;
use App\Http\Controllers\unitUtamaController;
use App\Models\Roadmap;
use App\Models\TahunRoadmap;
use App\Models\TujuanIt;
use App\Models\UnitKerja;
use App\Models\unitUtama;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('home');
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
Route::put('/organisasi/update-tujuanit/{id}', [unitUtamaController::class, 'editTujuanIt'])->name('organisasi.editTujuanIt')->middleware('auth');

Route::delete('/organisasi/delete-visi-misi/{id}', action: [unitUtamaController::class, 'destroy'])->name('organisasi.destroyVisiMisi')->middleware('auth');
Route::delete('/organisasi/delete-tujuan-organisasi/{id}', action: [unitUtamaController::class, 'destroys'])->name('organisasi.destroystujuan')->middleware('auth');
Route::delete('/organisasi/delete-tujuanit/{id}',[unitUtamaController::class,'destroyTujuanIt'])->name('organisasi.destroytujuanit')->middleware('auth');


Route::post('/unit/store-unit', [unitKerjaController::class,'store'])->name('unit.store')->middleware('auth');
Route::delete('/unit/{id}',[unitKerjaController::class, 'destroy'])->name('unit.destroy')->middleware('auth');
Route::put('/unit/{id}', [unitKerjaController::class, 'update'])->name('unit.update')->middleware('auth');

Route::post('/roadmap/store-tahunroadmap',[RoadmapController::class,'storetahun'])->name('roadmap.storetahun')->middleware('auth');
Route::post('/roadmap/destroytahun', [RoadmapController::class, 'destroytahun'])->name('roadmap.destroytahun');
Route::post('/roadmap/store-roadmap',[RoadmapController::class,'store'])->name('roadmap.store')->middleware('auth');
Route::delete('/roadmap/{id}',[RoadmapController::class, 'destroyRoadmap'])->name('roadmap.destroy')->middleware('auth');
Route::put('/roadmap/{id}',[RoadmapController::class, 'editRoadmap'])->name('roadmap.update')->middleware('auth');
Route::get('/roadmap/{tahunRoadmap}/{division}', function ($tahunRoadmap, $division) {
    return Excel::download(new RoadmapExport($tahunRoadmap, $division), "roadmap_$tahunRoadmap.xlsx");
})->name('roadmap.export');





Route::get('/unit', function () {
    $unit = UnitKerja::all();
    return view('unit',['unit'=>$unit]);
})->middleware('auth');

Route::get('/roadmap', function () {
    $roadmaps = Roadmap::with(['tujuanIts', 'unitKerja'])->get();
    $tujuanit = TujuanIt::all();
    $unitkerja = UnitKerja::all();
    $tahun_roadmap = TahunRoadmap::all();
    return view('roadmap',[
        'roadmaps'=>$roadmaps,
        'tujuanit' => $tujuanit,
        'unitkerja' => $unitkerja,
        'tahun_roadmap' => $tahun_roadmap,
    ]);
})->middleware('auth');

Route::get('/histori', function () {
    return view('histori');
})->middleware('auth');
