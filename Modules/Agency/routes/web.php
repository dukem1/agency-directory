<?php

use Illuminate\Support\Facades\Route;
use Modules\Agency\Http\Controllers\AgencyController;

Route::middleware([])->group(function () {
    Route::resource('agencies', AgencyController::class)->names('agency');
});
