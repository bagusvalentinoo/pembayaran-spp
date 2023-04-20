<?php

use App\Http\Controllers\Web\User\SuperAdmin\SuperAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Super Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'my-profile'], function () {
    Route::get('/', [SuperAdminController::class, 'myProfilePage'])->name('web.super_admin.profile.index');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [SuperAdminController::class, 'dashboardPage'])->name('web.super_admin.dashboard.index');
});

Route::group(['prefix' => 'sekolah'], function () {
    Route::get('/', [SuperAdminController::class, 'schoolPage'])->name('web.super_admin.school.index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [SuperAdminController::class, 'adminPage'])->name('web.super_admin.admin.index');
});
