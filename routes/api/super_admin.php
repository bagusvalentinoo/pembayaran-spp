<?php

use App\Http\Controllers\Api\SuperAdmin\Admin\AdminController;
use App\Http\Controllers\Api\SuperAdmin\Dashboard\DashboardController;
use App\Http\Controllers\Api\SuperAdmin\School\SchoolController;
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

Route::group(['prefix' => 'admins'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('api.super-admin.admin.index');
});

Route::group(['prefix' => 'schools'], function () {
    Route::get('/', [SchoolController::class, 'index'])->name('api.super-admin.school.index');
    Route::post('/', [SchoolController::class, 'store'])->name('api.super-admin.school.store');
});

