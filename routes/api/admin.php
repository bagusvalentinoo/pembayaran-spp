<?php

use App\Http\Controllers\Api\Admin\Classroom\ClassroomController;
use App\Http\Controllers\Api\Admin\Competency\CompetencyController;
use App\Http\Controllers\Api\Admin\Officer\OfficerController;
use App\Http\Controllers\Api\Admin\Student\StudentController;
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

Route::group(['prefix' => 'competencies'], function () {
    Route::get('/', [CompetencyController::class, 'index'])->name('api.admin.competency.index');
    Route::get('/{param}', [CompetencyController::class, 'show'])->name('api.admin.competency.show');
    Route::post('/', [CompetencyController::class, 'store'])->name('api.admin.comptency.store');
    Route::put('/{param}', [CompetencyController::class, 'update'])->name('api.admin.competency.update');
    Route::delete('/', [CompetencyController::class, 'destroy'])->name('api.admin.competency.destroy');
});

Route::group(['prefix' => 'classrooms'], function () {
    Route::get('/', [ClassroomController::class, 'index'])->name('api.admin.classroom.index');
    Route::get('/{param}', [ClassroomController::class, 'show'])->name('api.admin.classroom.show');
    Route::post('/', [ClassroomController::class, 'store'])->name('api.admin.classroom.store');
    Route::put('/{param}', [ClassroomController::class, 'update'])->name('api.admin.classroom.update');
    Route::delete('/', [ClassroomController::class, 'destroy'])->name('api.admin.classroom.destroy');
});

Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('api.admin.student.index');
    Route::get('/{param}', [StudentController::class, 'show'])->name('api.admin.student.show');
    Route::post('/', [StudentController::class, 'store'])->name('api.admin.student.store');
    Route::put('/{param}', [StudentController::class, 'update'])->name('api.admin.student.update');
    Route::delete('/', [StudentController::class, 'destroy'])->name('api.admin.student.destroy');
});

Route::group(['prefix' => 'officers'], function () {
    Route::get('/', [OfficerController::class, 'index'])->name('api.admin.officer.index');
    Route::get('/{param}', [OfficerController::class, 'show'])->name('api.admin.officer.show');
    Route::post('/', [OfficerController::class, 'store'])->name('api.admin.officer.store');
    Route::put('/{param}', [OfficerController::class, 'update'])->name('api.admin.officer.update');
    Route::delete('/', [OfficerController::class, 'destroy'])->name('api.admin.officer.destroy');
});
