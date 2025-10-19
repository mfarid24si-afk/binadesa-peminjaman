<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\binacontroller;

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
    return 'Nama Saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bina', [binacontroller::class, 'index'])->name('dashboard');
Route::get('/forms', [binacontroller::class, 'forms'])->name('forms');
Route::post('/forms/store', [binacontroller::class, 'store'])->name('forms.store');
Route::get('/tables', [binacontroller::class, 'tables'])->name('tables');
Route::delete('/tables/delete/{id}', [binacontroller::class, 'destroy'])->name('tables.destroy');
Route::get('/edit/{id}', [binacontroller::class, 'edit'])->name('forms.edit');
Route::put('/update/{id}', [binacontroller::class, 'update'])->name('forms.update');
