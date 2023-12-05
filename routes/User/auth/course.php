<?php

use App\Http\Controllers\CourseController;

use Illuminate\Support\Facades\Route;

Route::middleware('userAkses:admin,dokter,fisioterapis')
->prefix('dashboard')
->group(function () {
    Route::delete('/course/{id}/delete', [CourseController::class,'destroy'])->name('course.delete');
    Route::get("/course/{id}/course-evaluation", [CourseController::class,"evaluation"])->name("evaluation");
    Route::post("/course/{id}/course-evaluation", [CourseController::class,"evaluationpost"])->name("evaluation.store");
    Route::delete("/course/{id}/course-evaluation", [CourseController::class,"evaluationdelete"])->name("evaluation.destroy");
});

Route::group(['prefix'=> 'dashboard'], function () {
    Route::get('/course/{id}/course-detail', [CourseController::class,'show'])->name('course.detail');
});