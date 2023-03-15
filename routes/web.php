<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
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

Route::get('/', [DashboardController::class, 'dashboard'])->middleware('auth');

Route::controller(AuthController::class)->group(function () {
  Route::get('login', 'login')->name('login')->middleware('guest');
  Route::post('login', 'authenticate');
  Route::get('logout', 'logout');
});

Route::controller(PembayaranController::class)->group(function () {
  Route::get('bayar', 'bayar');
  Route::get('bayar', 'store');
});

Route::resource('spp', SppController::class)->middleware('admin');
Route::resource('siswa', SiswaController::class)->middleware('admin');
Route::resource('kelas', KelasController::class)->middleware('admin');
Route::resource('petugas', PetugasController::class)->middleware('admin');
