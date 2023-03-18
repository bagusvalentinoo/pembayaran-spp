<?php

use App\Http\Controllers\Web\User\Officer\OfficerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Petugas Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [OfficerController::class, 'dashboardPage'])->name('web.officer.dashboard.index');

Route::get('/pembayaran', [OfficerController::class, 'paymentPage'])->name('web.officer.payment.index');
Route::get('/history', [OfficerController::class, 'historyPage'])->name('web.officer.history.index');
