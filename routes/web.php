<?php

use App\Http\Controllers\binacontroller;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return ('selamat datang di halaman pcr');
});

Route::get('/mahasiswa', function () {
    return ('halo mahasiswa');
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama Saya: ' . $param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: ' . $param1;
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/a', function () {
    return view('bina_desa');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bina', [binacontroller::class, 'index'])->name('dashboard');
Route::get('/forms', [binacontroller::class, 'forms'])->name('forms');
Route::post('/forms/store', [binacontroller::class, 'store'])->name('forms.store');
Route::get('/tables', [binacontroller::class, 'tables'])->name('tables');
Route::delete('/tables/delete/{id}', [binacontroller::class, 'destroy'])->name('tables.destroy');
// Route::get('/edit/{id}', [binacontroller::class, 'edit'])->name('forms.edit');
// Route::put('/update/{id}', [binacontroller::class, 'update'])->name('forms.update');

// <==== WARGA ====>
Route::post('/forms/warga', [binacontroller::class, 'storeWarga'])->name('forms.store.warga');
Route::put('/update/warga/{id}', [binacontroller::class, 'updateWarga'])->name('warga.update');
Route::get('/edit/warga/{id}', [binacontroller::class, 'editWarga'])->name('warga.edit');
Route::delete('/tables/delete/warga/{id}', [binacontroller::class, 'destroyWarga'])->name('warga.destroy');

// <==== MEDIA ====>
Route::post('/forms/media', [binacontroller::class, 'storeMedia'])->name('forms.store.media');
Route::put('/update/media/{id}', [binacontroller::class, 'updateMedia'])->name('media.update');
Route::get('/edit/media/{id}', [binacontroller::class, 'editMedia'])->name('media.edit');
Route::delete('/tables/delete/media/{id}', [binacontroller::class, 'destroyMedia'])->name('media.destroy');

// <==== FASILITAS ====>
Route::post('/forms/fasilitas', [binacontroller::class, 'storeFasilitas'])->name('forms.store.fasilitas');
Route::put('/update/fasilitas/{id}', [binacontroller::class, 'updateFasilitas'])->name('fasilitas.update');
Route::get('/edit/fasilitas/{id}', [binacontroller::class, 'editFasilitas'])->name('fasilitas.edit');
Route::delete('/tables/delete/fasilitas/{id}', [binacontroller::class, 'destroyFasilitas'])->name('fasilitas.destroy');

// <==== PEMBAYARAN ====>
Route::post('/forms/pembayaran', [binacontroller::class, 'storePembayaran'])->name('forms.store.pembayaran');
Route::put('/update/pembayaran/{id}', [binacontroller::class, 'updatePembayaran'])->name('pembayaran.update');
Route::get('/edit/pembayaran/{id}', [binacontroller::class, 'editPembayaran'])->name('pembayaran.edit');
Route::delete('/tables/delete/pembayaran/{id}', [binacontroller::class, 'destroyPembayaran'])->name('pembayaran.destroy');

// <==== PEMINJAMAN ====>
Route::post('/forms/peminjaman', [binacontroller::class, 'storePeminjaman'])->name('forms.store.peminjaman');
Route::put('/update/peminjaman/{id}', [binacontroller::class, 'updatePeminjaman'])->name('peminjaman.update');
Route::get('/edit/peminjaman/{id}', [binacontroller::class, 'editPeminjaman'])->name('peminjaman.edit');
Route::delete('/tables/delete/peminjaman/{id}', [binacontroller::class, 'destroyPeminjaman'])->name('peminjaman.destroy');

// <==== PETUGAS ====>
Route::post('/forms/petugas', [binacontroller::class, 'storePetugas'])->name('forms.store.petugas');
Route::put('/update/petugas/{id}', [binacontroller::class, 'updatePetugas'])->name('petugas.update');
Route::get('/edit/petugas/{id}', [binacontroller::class, 'editPetugas'])->name('petugas.edit');
Route::delete('/tables/delete/petugas/{id}', [binacontroller::class, 'destroyPetugas'])->name('petugas.destroy');

// <==== SYARAT ====>
Route::post('/forms/syarat', [binacontroller::class, 'storeSyarat'])->name('forms.store.syarat');
Route::put('/update/syarat/{id}', [binacontroller::class, 'updateSyarat'])->name('syarat.update');
Route::get('/edit/syarat/{id}', [binacontroller::class, 'editSyarat'])->name('syarat.edit');
Route::delete('/tables/delete/syarat/{id}', [binacontroller::class, 'destroySyarat'])->name('syarat.destroy');

//<====Login=====>
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/forms/user', [AuthController::class, 'storeUser'])->name('forms.store.user');
Route::put('/update/user/{id}', [AuthController::class, 'updateUser'])->name('user.update');
Route::get('/edit/user/{id}', [AuthController::class, 'editUser'])->name('user.edit');
Route::delete('/tables/delete/user/{id}', [AuthController::class, 'destroyUser'])->name('user.destroy');
