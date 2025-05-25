<?php

namespace Modules\Agency\ModelFilters;

use EloquentFilter\ModelFilter;

class AgencyFilter extends ModelFilter
{
    public function categories(array $categories): void
    {
        $this->whereCategories($categories);
    }
}
