<?php

use App\Http\Controllers\Api\Auth\AuthenticateSessionController;
use App\Http\Controllers\Api\Auth\RefreshTokenController;
use App\Http\Controllers\Api\Auth\RegisterNewUserController;
use App\Http\Controllers\Api\Auth\UserAccountController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthenticateSessionController::class, 'store']);
    Route::post('register', [RegisterNewUserController::class, 'store']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'account'], function () {
    Route::post('/', [UserAccountController::class, 'profile']);
    Route::post('refresh/token', RefreshTokenController::class);
    Route::post('logout', [AuthenticateSessionController::class, 'logout']);
});
