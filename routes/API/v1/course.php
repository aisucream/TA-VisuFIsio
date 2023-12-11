<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CourseController;


Route::middleware(['auth:sanctum','akses:mobile'])
->prefix('courses')
->name('course.')
->group(function () {
    Route::get('/', [CourseController::class,'index'])->name('api.get.course');
    Route::post('/create', [CourseController::class,'store'])->name('api.post.course');
    Route::patch('/{c_id}/edit', [CourseController::class,'update'])->name('api.patch.course');
});

