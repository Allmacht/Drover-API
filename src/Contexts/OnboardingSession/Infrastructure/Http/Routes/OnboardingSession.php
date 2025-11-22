<?php

use Illuminate\Support\Facades\Route;
use Src\Contexts\OnboardingSession\Infrastructure\Http\Controllers\StartModuleSelectionController;

Route::prefix('/api/onboarding-sessions')->name('onboarding-sessions.')->middleware(['api', 'auth:sanctum'])->group(function () {
    Route::post('/start', StartModuleSelectionController::class)->name('start-module-selection');
});