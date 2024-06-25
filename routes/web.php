<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SubController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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



Route::middleware('guest')->group(function(){
    Route::get('/auth/login', [AuthController::class, 'index'])->name('login_views');
    Route::post('/auth/login/logedin', [AuthController::class, 'logedin'])->name('login_handle');
});

Route::middleware('auth')->group(function(){
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout_handle');
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::resource('user', UserController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('sub', SubController::class);
    Route::resource('penilaian', PenilaianController::class);
    Route::resource('proses', ProsesController::class);
    Route::resource('laporan', LaporanController::class);
    


});
