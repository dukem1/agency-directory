<?php

use Illuminate\Support\Facades\Route;
use Modules\Agency\Actions\GetAgencies;
use Modules\Agency\Actions\GetAgency;
use Modules\Agency\Http\Controllers\AgencyController;

Route::middleware([
    \Fahlisaputra\Minify\Middleware\MinifyHtml::class,
    'cache.headers:public;max_age=86400;etag'
])->group(function () {
//    Route::resource('agencies', AgencyController::class)->names('agency');
    Route::get('agencies', GetAgencies::class)->name('agency.list');
    Route::get('agencies/{agency}', GetAgency::class)->name('agency.agency');
});
