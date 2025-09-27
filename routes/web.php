<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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
Route::get ('/bina', function (){
    return view('bina_desa');
});