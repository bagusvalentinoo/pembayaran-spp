<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\General\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Public Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('api.general.user.index');
    Route::get('/{param}', [UserController::class, 'show'])->name('api.general.user.show');
    Route::put('/{param}', [UserController::class, 'update'])->name('api.general.user.update');
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.general.auth.logout');
});
