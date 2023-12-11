<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::post('/login', [AuthController::class,'login'])->name('api.login');
Route::post('/register', [AuthController::class,'register'])->name('api.register');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});