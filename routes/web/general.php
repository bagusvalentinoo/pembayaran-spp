<?php

use App\Http\Controllers\Web\General\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web General Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::get('/redirect', [AuthController::class, 'authRedirect'])->name('web.general.auth.authRedirect');
    Route::post('/logout', [AuthController::class, 'logout'])->name('web.general.auth.logout');
});
