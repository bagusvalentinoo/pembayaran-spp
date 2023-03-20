<?php

use App\Http\Controllers\Api\SuperAdmin\Admin\AdminController;
use App\Http\Controllers\Api\SuperAdmin\Dashboard\DashboardController;
use App\Http\Controllers\Api\SuperAdmin\School\SchoolController;
use App\Http\Controllers\Api\SuperAdmin\SchoolType\SchoolTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Super Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('api.super-admin.dashboard.index');
});

Route::group(['prefix' => 'school-types'], function () {
    Route::get('/', [SchoolTypeController::class, 'index'])->name('api.super-admin.school-type.index');
});

Route::group(['prefix' => 'schools'], function () {
    Route::get('/', [SchoolController::class, 'index'])->name('api.super-admin.school.index');
    Route::get('/{param}', [SchoolController::class, 'show'])->name('api.super-admin.school.show');
    Route::post('/', [SchoolController::class, 'store'])->name('api.super-admin.school.store');
    Route::put('/{param}', [SchoolController::class, 'update'])->name('api.super-admin.school.update');
    Route::delete('/', [SchoolController::class, 'destroy'])->name('api.super-admin.school.destroy');
});

Route::group(['prefix' => 'admins'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('api.super-admin.admin.admin.index');
    Route::get('/{param}', [AdminController::class, 'show'])->name('api.super-admin.admin.show');
    Route::put('/{param}', [AdminController::class, 'update'])->name('api.super-admin.admin.update');
});

