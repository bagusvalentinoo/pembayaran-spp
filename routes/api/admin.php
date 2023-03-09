<?php

use App\Http\Controllers\Api\Admin\Classroom\ClassroomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'classrooms'], function () {
    Route::get('/', [ClassroomController::class, 'index'])->name('api.admin.classroom.index');
    Route::get('/{param}', [ClassroomController::class, 'show'])->name('api.admin.classroom.show');
    Route::post('/', [ClassroomController::class, 'store'])->name('api.admin.classroom.store');
    Route::put('/{param}', [ClassroomController::class, 'update'])->name('api.admin.classroom.update');
    Route::delete('/', [ClassroomController::class, 'destroy'])->name('api.admin.classroom.destroy');
});
