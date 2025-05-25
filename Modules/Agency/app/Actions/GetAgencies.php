<?php

namespace Modules\Agency\Actions;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;
use Modules\Agency\Http\Requests\GetAgenciesRequest;
use Modules\Agency\ModelFilters\AgencyFilter;
use Modules\Agency\Models\Agency;
use Modules\Category\Models\Category;

class GetAgencies
{
    use AsAction;

    public function handle(array $data): Collection
    {
        return Agency::withCategories()
            ->filter($data, AgencyFilter::class)
            ->get();
    }

    public function asController(GetAgenciesRequest $request): View
    {
        $data = $request->validated();

        if (!empty($data['categories'])) {
            //TODO: move to sanitizer
            $categoryIds = Category::whereIn('slug', $data['categories'])->pluck('id')->toArray();
            $data['categories'] = $categoryIds;
        }

        return view('agency::agencies', ['agencies' => $this->handle($data)]);
    }
}
