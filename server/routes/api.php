<?php

use App\Http\Controllers\Api\Auth\AuthenticateSessionController;
use App\Http\Controllers\Api\Auth\DeleteAccountController;
use App\Http\Controllers\Api\Auth\RefreshTokenController;
use App\Http\Controllers\Api\Auth\RegisterNewUserController;
use App\Http\Controllers\Api\Auth\UpdatePasswordController;
use App\Http\Controllers\Api\Auth\UserAccountController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthenticateSessionController::class, 'store']);
    Route::post('register', [RegisterNewUserController::class, 'store']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'account'], function () {
    Route::post('/', [UserAccountController::class, 'profile']);
    Route::put('/update', [UserAccountController::class, 'update']);
    Route::put('/change-password', UpdatePasswordController::class);
    Route::delete('/delete', DeleteAccountController::class);

    Route::post('refresh/token', RefreshTokenController::class);
    Route::post('logout', [AuthenticateSessionController::class, 'logout']);
});
