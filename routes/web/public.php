<?php

use App\Http\Controllers\Web\Public\Auth\LoginController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Public Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WebController::class, 'homePage'])->name('web.public.homePage');

Route::middleware(['guest'])->prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('web.public.auth.loginPage');
});
