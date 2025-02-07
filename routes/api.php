<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('/user', ApiUserController::class);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::get('/logout', [ApiAuthController::class, 'logout']);
