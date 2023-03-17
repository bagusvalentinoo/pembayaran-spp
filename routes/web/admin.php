<?php

use App\Http\Controllers\Web\User\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [AdminController::class, 'dashboardPage'])->name('web.admin.dashboard.index');
});

Route::group(['prefix' => 'kompetensi'], function () {
    Route::get('/', [AdminController::class, 'competencyPage'])->name('web.admin.competency.index');
});

Route::group(['prefix' => 'kelas'], function () {
    Route::get('/', [AdminController::class, 'classroomPage'])->name('web.admin.classroom.index');
});

Route::group(['prefix' => 'siswa'], function () {
    Route::get('/', [AdminController::class, 'studentPage'])->name('web.admin.student.index');
});
