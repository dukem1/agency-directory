<?php

namespace Modules\Category\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Category\Models\Category;
use Illuminate\Database\Eloquent\Builder;


/**
 * @method Builder|static withCategories()
 *
 * @see HasCategories::scopeWithCategories
 *
 * @method Builder|static whereCategories(array $ids)
 *
 * @see HasCategories::scopeWhereCategories
 */
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

    public function scopeWithCategories(
        Builder $query,
    ): void {
        $query->with('categories', function ($q) {
            $q
                ->select([
                    'categories.id',
                    'categories.slug',
                    'categories.name',
                ]);
        });
    }

    abstract protected function getHasCategoriesTable(): string;
}
