<?php

use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return view('elearning');
});

// Auth::routes();
Auth::routes(['verify' => true]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('fakultas', App\Http\Controllers\FakultasController::class);
    Route::resource('programStudis', App\Http\Controllers\ProgramStudiController::class);
    Route::resource('tipeSoals', App\Http\Controllers\TipeSoalController::class);
    Route::resource('kategoris', App\Http\Controllers\KategoriController::class);
    Route::resource('mataKuliahs', App\Http\Controllers\MataKuliahController::class);
    Route::resource('ujians', App\Http\Controllers\UjianController::class);
    Route::resource('soals', App\Http\Controllers\SoalController::class);
    Route::resource('pilihans', App\Http\Controllers\PilihanController::class);
    Route::resource('mataKuliahs', App\Http\Controllers\MataKuliahController::class);
    Route::resource('roles', App\Http\Controllers\RolesController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
    Route::resource('jawabans', App\Http\Controllers\JawabanController::class);
    Route::resource('mataKuliahs', App\Http\Controllers\MataKuliahController::class);
    Route::post('ujians/changeStatus/{id}', [App\Http\Controllers\UjianController::class, 'changeStatus'])->name('ujians.changeStatus');
    Route::get('ujians/createSoal/{id}', [App\Http\Controllers\UjianController::class, 'createSoal'])->name('ujians.createSoal');
    Route::patch('ujians/updateSoal/{id}', [App\Http\Controllers\UjianController::class, 'updateSoal'])->name('ujians.updateSoal');
    Route::get('ujians/mahasiswa-ujian/{id}', [App\Http\Controllers\UjianController::class, 'ujiansMahasiswa'])->name('ujians.mahasiswa-ujian');
    Route::get('ujians/edit-soal/{id}', [App\Http\Controllers\UjianController::class, 'editSoal'])->name('ujians.edit-soal');
    Route::post('ujians/kode-ujian/{id}', [App\Http\Controllers\UjianController::class, 'kodeUjian'])->name('ujians.kode-ujian');
});