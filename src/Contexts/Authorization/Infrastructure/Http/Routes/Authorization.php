<?php

use Illuminate\Support\Facades\Route;
use Src\Contexts\Authorization\Infrastructure\Http\Controllers\SignInController;
use Src\Contexts\Authorization\Infrastructure\Http\Controllers\SignOutController;

Route::middleware('api')->prefix('api/auth')->name('authorization')->group(function () {
    Route::post('/sign-in', SignInController::class)->name('.sign-in');

    Route::middleware('auth:sanctum')->group(function () {
        Route::delete('/sign-out', SignOutController::class)->name('.sign-out');
    });
});
