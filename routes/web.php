<?php

use App\Http\Controllers\BanjarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use App\Exports\PendudukExport;
use App\Exports\KeluargaExport;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\SuratController;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Banjar;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('post.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index')->middleware('auth');
Route::get('/keluarga', [PendudukController::class, 'keluarga'])->name('keluarga.index')->middleware('auth');

Route::get('/penduduk/filter', [PendudukController::class, 'filterPenduduk'])->name('penduduk.filter')->middleware('auth');

Route::get('/keluarga/filter', [PendudukController::class, 'filterKeluarga'])->name('keluarga.filter')->middleware('auth');

Route::get('/penduduk/detail/{id}', [PendudukController::class, 'detail_penduduk'])->name('detail_penduduk')->middleware('auth');
Route::get('/keluarga/detail/{id}', [PendudukController::class, 'detail_keluarga'])->name('detail_keluarga')->middleware('auth');
Route::put('/penduduk/edit/{id}', [PendudukController::class, 'update'])->name('penduduk.update')->middleware('auth');
Route::put('/keluarga/edit/{id}', [PendudukController::class, 'update'])->name('keluarga.update')->middleware('auth');
Route::get('/penduduk/list/{no_kk}', [PendudukController::class, 'penduduk_list_keluarga'])->name('penduduk.list.keluarga')->middleware('auth');
Route::get('/keluarga/list/{no_kk}', [PendudukController::class, 'keluarga_list_keluarga'])->name('keluarga.list.keluarga')->middleware('auth');
Route::get('/penduduk/tambah', [PendudukController::class, 'create'])->name('penduduk.show.tambah')->middleware('auth');
Route::post('/penduduk/tambah', [PendudukController::class, 'store'])->name('penduduk.store')->middleware('auth');

Route::post('/penduduk/list/{no_kk}', [PendudukController::class, 'ubah_kk_penduduk']);
Route::post('/keluarga/list/{no_kk}', [PendudukController::class, 'ubah_kk_keluarga']);

Route::get('/banjar', [BanjarController::class, 'index'])->name('banjar.index')->middleware('auth');
Route::get('/banjar/filter', [BanjarController::class, 'filterBanjar'])->name('banjar.filter')->middleware('auth');
Route::get('/banjar/tambah', [BanjarController::class, 'create'])->name('banjar.tambah')->middleware('auth');
Route::post('/banjar/tambah', [BanjarController::class, 'store'])->name('banjar.store')->middleware('auth');
Route::delete('/banjar/delete/{id}', [BanjarController::class, 'destroy'])->name('banjar.delete')->middleware('auth');
Route::get('/banjar/edit/{id}', [BanjarController::class, 'edit'])->name('banjar.edit')->middleware('auth');
Route::put('/banjar/edit/{id}', [BanjarController::class, 'update'])->name('banjar.update')->middleware('auth');


Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('/user/filter', [UserController::class, 'filterUser'])->name('user.filter')->middleware('auth');
Route::get('/user/tambah', [UserController::class, 'create'])->name('user.tambah')->middleware('auth');
Route::post('/user/tambah', [UserController::class, 'store'])->name('user.store')->middleware('auth');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete')->middleware('auth');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update')->middleware('auth');


Route::delete('/penduduk/delete/{id}', [PendudukController::class, 'destroy'])->name('penduduk.delete')->middleware('auth');

Route::get('/visitors-data', [VisitorController::class, 'getVisitors'])->middleware('auth');

Route::get('/export-penduduk', function (Illuminate\Http\Request $request) {
    $today = now()->format('Y-m-d');
    return Excel::download(
        new PendudukExport($request->all()), 
        "data-penduduk-{$today}.xlsx"
    );
});

Route::get('/export-keluarga', function (Illuminate\Http\Request $request) {
    $today = now()->format('Y-m-d');
    return Excel::download(
        new KeluargaExport($request->all()), 
        "data-keluarga-{$today}.xlsx"
    );
});


 Route::get('/surat',[SuratController::class, 'index'])->name('surat')->middleware('auth');
 Route::post('/surat',[SuratController::class, 'post'])->name('post.surat')->middleware('auth');

 Route::get('/tes', function(){
    return view('surat.contoh');
 });

Route::get('/master/jenis_kelamin', [DataMasterController::class, 'jenis_kelamin'])->name('jenis_kelamin.index')->middleware('auth');
Route::get('/master/pendidikan', [DataMasterController::class, 'pendidikan'])->name('pendidikan.index')->middleware('auth');
Route::get('/master/pendidikan_sedang', [DataMasterController::class, 'pendidikan_sedang'])->name('pendidikan_sedang.index')->middleware('auth');
Route::get('/master/status_dasar', [DataMasterController::class, 'status_dasar'])->name('status_dasar.index')->middleware('auth');
Route::get('/master/pekerjaan', [DataMasterController::class, 'pekerjaan'])->name('pekerjaan.index')->middleware('auth');
Route::get('/master/jenis_surat', [DataMasterController::class, 'jenis_surat'])->name('jenis_surat.index')->middleware('auth');



Route::get('/jenis_surat/tambah', [SuratController::class, 'create'])->name('jenis_surat.tambah')->middleware('auth');
Route::post('/jenis_surat/tambah', [SuratController::class, 'store'])->name('surat.store')->middleware('auth');

Route::get('/jenis_surat/detail/{id}', [SuratController::class, 'edit'])->name('jenis_surat.edit')->middleware('auth');
Route::post('/jenis_surat/detail/{id}', [SuratController::class, 'update'])->name('jenis_surat.update')->middleware('auth');




Route::get('/penduduk/kartu-keluarga/{no_kk}', [PendudukController::class, 'kartu_keluarga'])->middleware('auth');
Route::get('/keluarga/kartu-keluarga/{no_kk}', [PendudukController::class, 'kartu_keluarga'])->middleware('auth');