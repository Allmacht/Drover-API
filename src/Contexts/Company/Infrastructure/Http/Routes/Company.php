<?php

use Illuminate\Support\Facades\Route;
use Src\Contexts\Company\Infrastructure\Http\Controllers\CreateCompanyController;

Route::prefix('/api/companies')->name('companies.')->middleware(['api', 'auth:sanctum'])->group(function () {
    Route::post('/', CreateCompanyController::class)->name('create');
});
