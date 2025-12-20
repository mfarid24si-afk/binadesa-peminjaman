<?php

use App\Http\Controllers\binacontroller;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SyaratController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/pcr', function () {
//     return ('selamat datang di halaman pcr');
// });

// Route::get('/mahasiswa', function () {
//     return ('halo mahasiswa');
// });

// Route::get('/nama/{param1}', function ($param1) {
//     return 'Nama Saya: ' . $param1;
// });

// Route::get('/nim/{param1?}', function ($param1 = '') {
//     return 'NIM saya: ' . $param1;
// });

// Route::get('/mahasiswa', function () {
//     return 'Halo Mahasiswa';
// })->name('mahasiswa.show');

// Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

// Route::get('/a', function () {
//     return view('bina_desa');
// });

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/regis', [Authcontroller::class, 'regis'])
->name('regis');
Route::get('/bina', [binacontroller::class, 'index'])
->middleware('checkislogin')
->name('dashboard');
Route::get('/forms', [binacontroller::class, 'forms'])
->middleware('checkislogin')
->name('forms');
Route::post('/forms/store', [binacontroller::class, 'store'])->name('forms.store');
Route::get('/tables', [binacontroller::class, 'tables'])
->middleware('checkislogin')
->name('tables');
Route::delete('/tables/delete/{id}', [binacontroller::class, 'destroy'])->name('tables.destroy');
// Route::get('/edit/{id}', [binacontroller::class, 'edit'])->name('forms.edit');
// Route::put('/update/{id}', [binacontroller::class, 'update'])->name('forms.update');

// <==== WARGA ====>
Route::post('/forms/warga', [WargaController::class, 'storeWarga'])->name('forms.store.warga');
Route::put('/update/warga/{id}', [WargaController::class, 'updateWarga'])->name('warga.update');
Route::get('/edit/warga/{id}', [WargaController::class, 'editWarga'])
->middleware('checkislogin')
->name('warga.edit');
Route::delete('/tables/delete/warga/{id}', [WargaController::class, 'destroyWarga'])->name('warga.destroy');
Route::get('/tables/warga', [WargaController::class, 'index'])
->middleware('checkislogin')
->name('warga');

// <==== MEDIA ====>
Route::post('/forms/media', [MediaController::class, 'storeMedia'])->name('forms.store.media');
Route::put('/update/media/{id}', [MediaController::class, 'updateMedia'])->name('media.update');
Route::get('/edit/media/{id}', [MediaController::class, 'editMedia'])
->middleware('checkislogin')
->name('media.edit');
Route::delete('/tables/delete/media/{id}', [MediaController::class, 'destroyMedia'])->name('media.destroy');
Route::get('/tables/media', [MediaController::class, 'index'])
->middleware('checkislogin')
->name('media');

// <==== FASILITAS ====>
Route::post('/forms/fasilitas', [FasilitasController::class, 'storeFasilitas'])->name('forms.store.fasilitas');
Route::get('/tables/fasilitas', [FasilitasController::class, 'index'])
->middleware('checkislogin')
->name('fasilitas');
Route::get('/edit/fasilitas/{id}', [FasilitasController::class, 'editFasilitas'])
->middleware('checkislogin')
->name('fasilitas.edit');
Route::put('/update/fasilitas/{id}', [FasilitasController::class, 'updateFasilitas'])->name('fasilitas.update');
Route::delete('/tables/delete/fasilitas/{id}', [FasilitasController::class, 'destroyFasilitas'])->name('fasilitas.destroy');
Route::get('/fasilitas/{id}', 
  [FasilitasController::class, 'show']
)->middleware('checkislogin')
->name('fasilitas.show');


// <==== PEMBAYARAN ====>
Route::post('/forms/pembayaran', [PembayaranController::class, 'storePembayaran'])->name('forms.store.pembayaran');
Route::get('/edit/pembayaran/{id}', [PembayaranController::class, 'editPembayaran'])
->middleware('checkislogin')
->name('pembayaran.edit');
Route::put('/update/pembayaran/{id}', [PembayaranController::class, 'updatePembayaran'])->name('pembayaran.update');
Route::delete('/tables/delete/pembayaran/{id}', [PembayaranController::class, 'destroyPembayaran'])->name('pembayaran.destroy');
Route::get('/tables/pembayaran', [PembayaranController::class, 'index'])
->middleware('checkislogin')
->name('pembayaran');

// <==== PEMINJAMAN ====>
Route::get('/tables/peminjaman', [PeminjamanController::class, 'index'])
->middleware('checkislogin')
->name('peminjaman');
Route::post('/forms/peminjaman', [PeminjamanController::class, 'storePeminjaman'])
    ->name('forms.store.peminjaman');
Route::get('/edit/peminjaman/{id}', [PeminjamanController::class, 'editPeminjaman'])
    ->middleware('checkislogin')
    ->name('peminjaman.edit');
Route::put('/update/peminjaman/{id}', [PeminjamanController::class, 'updatePeminjaman'])
    ->name('peminjaman.update');
Route::delete('/tables/delete/peminjaman/{id}', [PeminjamanController::class, 'destroyPeminjaman'])
    ->name('peminjaman.destroy');

// <==== PETUGAS ====>
Route::get('/forms/petugas', [PetugasController::class, 'createPetugas'])
    ->middleware('checkislogin')
    ->name('forms.create.petugas');
Route::post('/forms/petugas', [PetugasController::class, 'storePetugas'])->name('forms.store.petugas');
Route::put('/update/petugas/{id}', [PetugasController::class, 'updatePetugas'])->name('petugas.update');
Route::get('/edit/petugas/{id}', [PetugasController::class, 'editPetugas'])
->middleware('checkislogin')
->name('petugas.edit');
Route::delete('/tables/delete/petugas/{id}', [PetugasController::class, 'destroyPetugas'])->name('petugas.destroy');
Route::get('/tables/petugas', [PetugasController::class, 'index'])
->middleware('checkislogin')
->name('petugas');

// <==== SYARAT ====>
Route::get('/tables/syarat', [SyaratController::class, 'index'])
->middleware('checkislogin')
->name('syarat');
Route::post('/forms/syarat', [SyaratController::class, 'storeSyarat'])->name('forms.store.syarat');
Route::get('/edit/syarat/{id}', [SyaratController::class, 'editSyarat'])
->middleware('checkislogin')
->name('syarat.edit');
Route::put('/update/syarat/{id}', [SyaratController::class, 'updateSyarat'])->name('syarat.update');
Route::delete('/tables/delete/syarat/{id}', [SyaratController::class, 'destroySyarat'])->name('syarat.destroy');

//<====Login=====>
Route::get('/login', [AuthController::class, 'showLoginForm'])

->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//<====User====>
Route::get('/user', [AuthController::class, 'user'])
    ->middleware('checkislogin')
    ->name('user');

Route::post('/forms/user', [AuthController::class, 'storeUser'])
    ->middleware('checkrole:super admin')
    ->name('forms.store.user');

Route::put('/update/user/{id}', [AuthController::class, 'updateUser'])
    ->middleware('checkrole:super admin,admin') 
    ->name('user.update');

Route::get('/edit/user/{id}', [AuthController::class, 'editUser'])
    ->middleware(['checkislogin', 'checkrole:super admin,admin']) 
    ->name('user.edit');

Route::delete('/tables/delete/user/{id}', [AuthController::class, 'destroyUser'])
    ->middleware('checkrole:super admin') 
    ->name('user.destroy');

Route::get('/profil-pengembang', [AuthController::class, 'index'])
    ->middleware('checkislogin') 
    ->name('developer.profile');
