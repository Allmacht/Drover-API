<?php

use Illuminate\Support\Facades\Route;
use Src\Contexts\Authorization\Infrastructure\Http\Controllers\SignInController;

Route::middleware('api')->prefix('api/auth')->name('authorization')->group(function () {
    Route::post('/sign-in', SignInController::class)->name('.sign-in');
});
