<?php

use App\Http\Controllers\Api\Auth\AuthenticateSessionController;
use App\Http\Controllers\Api\Auth\RegisterNewUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthenticateSessionController::class, 'store']);
    Route::post('register', [RegisterNewUserController::class, 'store']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'auth'], function () {
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('logout', 'AuthController@logout');
});
