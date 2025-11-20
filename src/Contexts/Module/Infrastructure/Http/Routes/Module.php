<?php

use Illuminate\Support\Facades\Route;
use Src\Contexts\Module\Infrastructure\Http\Controllers\GetModulesController;

Route::prefix('api/modules')->middleware('api')->name('modules')->group(function () {
    Route::get('/', GetModulesController::class)->name('.index');
});
