<?php

namespace Modules\Agency\Actions;

use Illuminate\Contracts\View\View;
use Lorisleiva\Actions\Concerns\AsAction;
use Modules\Agency\Models\Agency;

class GetAgencies
{
    use AsAction;

    public function handle(): \Illuminate\Database\Eloquent\Collection
    {
        return Agency::all();
    }

    public function asController(): View
    {
        return view('agency::agencies', ['agencies' => $this->handle()]);
    }
}
