<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserManagement\AccountController;
use Illuminate\Support\Facades\Route;

Route::middleware("userAkses:admin")
->prefix("admin")
->group(function () {  
    Route::get('/user-management', [AccountController::class, 'index'])->name('account');
    Route::get('/user-management/{id}/detail-user', [AccountController::class, 'show'])->name('account.show');
    Route::delete('/user-management/{id}/delete', [AccountController::class, 'destroy'])->name('account.delete');

    Route::get('/register', [RegisteredUserController::class, 'buat'])->name('daftar');
    Route::post('/register', [RegisteredUserController::class, 'simpan'])->name('daftar.simpan');
    Route::get('/register/{id}/roles', [RegisteredUserController::class, 'peran'])->name('daftar.peran');
    Route::post('/register/{id}', [RegisteredUserController::class, 'edit'])->name('daftar.peran.edit');

});

