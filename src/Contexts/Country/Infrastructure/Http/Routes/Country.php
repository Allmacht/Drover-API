<?php

use Illuminate\Support\Facades\Route;
use Src\Contexts\Country\Infrastructure\Http\Controllers\GetAllAvailableCountriesController;

Route::name('countries.')->prefix('/api/countries')->group(function () {
    Route::get('/', GetAllAvailableCountriesController::class)->name('index');
});
