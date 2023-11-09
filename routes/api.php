<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\CourseDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/course', CourseController::class);
    Route::apiResource('/detailCourse', CourseDetailController::class);
    Route::get('/logout', [AuthController::class,'logOut']);
});

// Route::apiResource('/course', CourseController::class);
Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);