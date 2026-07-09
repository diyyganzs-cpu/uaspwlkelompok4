<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AuthController;


Route::middleware('role:warga')->group(function () {

    Route::get('/', [WargaController::class, 'dashboard'])
        ->name('warga.dashboard');

    Route::get('/create', [WargaController::class, 'create'])
        ->name('warga.create');

    Route::post('/store', [WargaController::class, 'store'])
        ->name('warga.store');

    Route::get('/riwayat', [WargaController::class, 'riwayat'])
        ->name('warga.riwayat');
    
     Route::get('/profil', [WargaController::class, 'profil'])
        ->name('warga.profil');   
    
    Route::get('/profil/edit', [WargaController::class, 'editProfil'])
    ->name('warga.edit.profil');

    Route::put('/profil/update', [WargaController::class, 'updateProfil'])
    ->name('warga.update.profil');

});

Route::middleware('role:petugas')->group(function () {

    Route::get('/petugas', [PetugasController::class, 'dashboard'])
        ->name('petugas.dashboard');

    Route::get('/petugas/pengaduan', [PetugasController::class, 'index'])
        ->name('petugas.index');

    Route::get('/petugas/edit/{id}', [PetugasController::class, 'edit'])
        ->name('petugas.edit');

    Route::put('/petugas/update/{id}', [PetugasController::class, 'update'])
        ->name('petugas.update');

}); 
Route::get('/petugas/pengaduan',[PetugasController::class,'index'])
    ->name('petugas.index');

Route::get('/petugas/riwayat',[PetugasController::class,'riwayat'])
    ->name('petugas.riwayat');

// AUTH
Route::get('/login',[AuthController::class,'loginForm'])->name('login');

Route::post('/login',[AuthController::class,'login']);

Route::get('/register',[AuthController::class,'registerForm'])->name('register');

Route::post('/register',[AuthController::class,'register']);

Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])
    ->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('password.update');

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
    ->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('password.reset');

Route::post('/logout',[AuthController::class,'logout'])
        ->name('logout');