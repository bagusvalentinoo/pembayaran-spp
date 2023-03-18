<?php

use App\Http\Controllers\Web\User\Student\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Siswa Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [StudentController::class, 'dashboardPage'])->name('web.student.dashboard.index');

Route::get('/riwayat', [StudentController::class, 'historyPage'])->name('web.student.history.index');
