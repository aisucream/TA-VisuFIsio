<?php

use App\Http\Controllers\API\CourseDetailController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])
->prefix('course-details')
->name('courseDetail.')
->group(function () {
    Route::get('/',[CourseDetailController::class,'index'])->name('get');
    Route::post('/create',[CourseDetailController::class,'store'])->name('post');
    Route::patch('/update/{id}',[CourseDetailController::class,'update'])->name('patch');
});