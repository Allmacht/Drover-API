<?php

use Illuminate\Support\Facades\Route;
use Src\Contexts\User\Infrastructure\Http\Controllers\GetCurrentUserInformationController;
use Src\Contexts\User\Infrastructure\Http\Controllers\RegisterUserController;

Route::middleware('api')->prefix('api/users')->name('users')->group(function () {

    Route::post('/sign-up', RegisterUserController::class)->name('.register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', GetCurrentUserInformationController::class)->name('.me');
    });
});
