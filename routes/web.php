<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::middleware('only_guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('dashboard',[PublicController::class, 'index']);

    Route::get('matkul-detail/{id}', [MataKuliahController::class, 'detailMatkul'])->middleware('only_admin', 'only_dosen');
});

Route::middleware('only_admin')->group(function() {
    Route::get('matakuliah', [MataKuliahController::class, 'index']);
    Route::get('matakuliah-add', [MataKuliahController::class, 'add']);
    Route::post('matakuliah-add', [MataKuliahController::class, 'store']);
    // Route::get('matkul-detail/{id}', [MataKuliahController::class, 'detailMatkul']);
    Route::get('matakuliah-edit/{id}', [MataKuliahController::class, 'edit']);
    Route::post('matakuliah-edit/{id}', [MataKuliahController::class, 'update']);
    Route::delete('matakuliah-delete/{id}', [MataKuliahController::class, 'delete']);

    Route::get('dosen', [DosenController::class, 'index']);
    Route::get('dosen-detail/{id}', [DosenController::class, 'detail']);

    Route::get('mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('mahasiswa-detail/{id}', [MahasiswaController::class, 'detail']);
});

Route::middleware('only_mahasiswa')->group(function() {
    Route::get('profile-mahasiswa', [MahasiswaController::class, 'profileMahasiswa']);
    Route::put('profile-edit', [MahasiswaController::class, 'profileUpdate']);

    Route::get('matkul-mahasiswa', [MahasiswaController::class, 'matkulMahasiswa']);
    Route::get('matkul-mahasiswa-tambah/{idMatkul}', [MahasiswaController::class, 'ambilMatkul']);
    Route::delete('matkul-mahasiswa-batal/{id}', [MahasiswaController::class, 'BatalMatkul']);


   
});

Route::middleware('only_dosen')->group(function() {
    Route::get('profile-dosen', [DosenController::class, 'profileDosen']);
    Route::put('profile-edit', [DosenController::class, 'profileUpdate']);
    Route::get('matkul-dosen', [DosenController::class, 'matkulDosen']);

});

// Route::middleware('only_dosen', 'only_admin')->group(function() {
//     Route::get('matkul-detail/{id}', [MataKuliahController::class, 'detailMatkul']);
// });

// Route::get('matkul-detail/{id}', [MataKuliahController::class, 'detailMatkul']){
//     //
//     })->middleware('first', 'second');
