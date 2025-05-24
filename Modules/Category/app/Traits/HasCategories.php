<?php

namespace Modules\Category\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Category\Models\Category;

trait HasCategories
{
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, $this->getHasCategoriesTable());
    }

    public function syncCategories(?array $categories = null): void
    {
        if (empty($categories)) {
            $this->categories()->detach();
            return;
        }
        $this->categories()->sync($categories);
    }

    abstract protected function getHasCategoriesTable(): string;
}
