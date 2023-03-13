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

    Route::get('/kompetensi', [AdminController::class, 'kompetensiPage'])->name('web.admin.kompetensi.index');

    Route::get('/kelas', [AdminController::class, 'kelasPage'])->name('web.admin.kelas.index');

    Route::get('/siswa', [AdminController::class, 'siswaPage'])->name('web.admin.siswa.index');
});
