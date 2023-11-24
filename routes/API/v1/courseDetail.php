<?php

use App\Http\Controllers\API\CourseDetailController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum','akses:mobile'])
->prefix('course-details')
->name('courseDetail.')
->group(function () {
    Route::get('/',[CourseDetailController::class,'index'])->name('get');
    Route::post('/create',[CourseDetailController::class,'store'])->name('post');
    Route::patch('/{cd_id}/edit',[CourseDetailController::class,'update'])->name('patch');
});