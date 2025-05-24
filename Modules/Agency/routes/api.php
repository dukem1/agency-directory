<?php

use Illuminate\Support\Facades\Route;
use Modules\Agency\Http\Controllers\AgencyController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('agencies', AgencyController::class)->names('agency');
});
