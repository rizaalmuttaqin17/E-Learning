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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();
Auth::routes(['verify' => true]);
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


Route::resource('roles', App\Http\Controllers\RoleController::class);


Route::resource('permissions', App\Http\Controllers\PermissionController::class);


Route::resource('jawabans', App\Http\Controllers\JawabanController::class);
