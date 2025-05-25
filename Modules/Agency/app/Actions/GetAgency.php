<?php

namespace Modules\Agency\Actions;

use Illuminate\Contracts\View\View;
use Lorisleiva\Actions\Concerns\AsAction;
use Modules\Agency\Models\Agency;

class GetAgency
{
    use AsAction;

    public function handle(Agency $agency): View
    {
        $agency->loadMissing('categories');

        return view('agency::agency', ['agency' => $agency]);
    }
}
